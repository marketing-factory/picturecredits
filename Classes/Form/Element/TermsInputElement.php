<?php
declare(strict_types = 1);
namespace Mfc\Picturecredits\Form\Element;

use Doctrine\DBAL\DBALException;
use Mfc\Picturecredits\Domain\Repository\PictureTermsRepository;
use Mfc\Picturecredits\Type\MetadataFieldType;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Backend\Form\NodeFactory;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;

/**
 * Class TermsInputElement
 *
 * Custom field type that checks the configured picture terms fields.
 *
 * @package Mfc\Picturecredits\Domain\Repository
 * @author Sebastian Klein <sebastian.klein@marketing-factory.de>
 */
class TermsInputElement extends AbstractFormElement
{
    /**
     * Default field information enabled for this element.
     *
     * @var array
     */
    protected $defaultFieldInformation = [
        'tcaDescription' => [
            'renderType' => 'tcaDescription',
        ],
    ];

    /**
     * @var IconFactory
     */
    protected $iconFactory;

    /**
     * @var PictureTermsRepository
     */
    protected $pictureTermsRepository;

    /**
     * @param NodeFactory $nodeFactory
     * @param array $data
     */
    public function __construct(NodeFactory $nodeFactory, array $data)
    {
        parent::__construct($nodeFactory, $data);

        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);
        $this->pictureTermsRepository = GeneralUtility::makeInstance(PictureTermsRepository::class);
    }

    public function render():array
    {
        $row = $this->data['databaseRow'];
        $parameterArray = $this->data['parameterArray'];

        // Don't render field if no picture terms are selected:
        if ((int)current($row['terms']) === 0) {
            return $resultArray = [];
        }

        $fieldInformationResult = $this->renderFieldInformation();
        $fieldInformationHtml = $fieldInformationResult['html'];
        $resultArray = $this->mergeChildReturnIntoExistingResult($this->initializeResultArray(), $fieldInformationResult, false);
        $itemValue = $parameterArray['itemFormElValue'];

        $icons = [
            'empty' => 'miscellaneous-placeholder',
            'exclamation' => 'actions-exclamation-circle-alt'
        ];
        $colors = [
            'notMandatory' => 'transparent',
            'ok' => '#79a548',
            'mandatory' => '#c83c3c',
            'mandatoryIfPresent' => '#e8a33d'
        ];
        $icon = $icons['empty'];
        $iconColor = $colors['notMandatory'];

        $fieldId = StringUtility::getUniqueId('formengine-input-');

        $attributes = [
            'id' => $fieldId,
            'data-formengine-input-name' => htmlspecialchars($parameterArray['itemFormElName']),
            'class' => implode(' ', [
                'form-control',
                't3js-clearable',
            ]),
            'data-formengine-input-params' => (string)json_encode([
                'field' => $parameterArray['itemFormElName'],
                'evalList' => '',
                'is_in' => '',
            ])
        ];

        try {
            $termsRecord = $this->pictureTermsRepository->findByTermsUid((int)current($row['terms']));
            $fieldName = $this->data['fieldName'];
            $prefixedFieldName = 'field_' . $this->data['fieldName'];

            if (array_key_exists($prefixedFieldName, $termsRecord)) {
                $fieldType = (int)$termsRecord[$prefixedFieldName];

                // Depending on field configuration: don't render field, or set mandatory hints:
                if ($fieldType === MetadataFieldType::HIDDEN) {
                    return $resultArray = [];
                } elseif ($fieldType === MetadataFieldType::MANDATORY) {
                    $icon = $icons['exclamation'];
                    $iconColor = ($itemValue) ? $colors['ok'] : $colors['mandatory'];
                    $attributes['class'] .= ' t3js-mandatory-term';
                } elseif ($fieldType === MetadataFieldType::MANDATORY_IF_PRESENT) {
                    $icon = $icons['exclamation'];
                    $iconColor = ($itemValue) ? $colors['ok'] : $colors['mandatoryIfPresent'];
                    $attributes['class'] .= ' t3js-mandatory-term t3js-mandatory-term-if-present';
                }

                // Show the terms' default value as placeholder:
                if (!empty($termsRecord[$fieldName])) {
                    $attributes['placeholder'] = $this->getLanguageService()->sL('LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:sys_file_metadata.placeholder.default');
                    $attributes['placeholder'] .= ' ' . htmlspecialchars($termsRecord[$fieldName]);
                }
            }
        } catch (\RuntimeException $ignoredException) {
            // deliberately empty
        } catch (DBALException $e) {
            return $resultArray = [];
        }

        $html[] = '<div class="formengine-field-item t3js-formengine-field-item">';
        $html[] =     $fieldInformationHtml;
        $html[] =     '<div class="form-control-wrap">';
        $html[] =         '<div class="form-wizards-wrap">';
        $html[] =             '<div class="form-wizards-element">';
        $html[] =                 '<div class="input-group">';
        $html[] =                     '<span class="input-group-addon input-group-icon t3js-form-field-termsinput-icon" style="color: ' . $iconColor . ';">';
        $html[] =                         $this->iconFactory->getIcon($icon, Icon::SIZE_SMALL)->render();
        $html[] =                     '</span>';
        $html[] =                     '<input type="text"' . GeneralUtility::implodeAttributes($attributes, true) . ' />';
        $html[] =                     '<input type="hidden" name="' . $parameterArray['itemFormElName'] . '" value="' . htmlspecialchars((string)$itemValue) . '" />';
        $html[] =                 '</div>';
        $html[] =             '</div>';
        $html[] =         '</div>';
        $html[] =     '</div>';
        $html[] = '</div>';
        $resultArray['html'] = implode(LF, $html);

        $resultArray['javaScriptModules'][] = JavaScriptModuleInstruction::create(
            '@mfc/picturecredits-mandatory-evaluation'
        );

        return $resultArray;
    }
}
