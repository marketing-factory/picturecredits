<?php
declare(strict_types=1);

namespace Mfc\Picturecredits\Form\Element;

use Doctrine\DBAL\DBALException;
use Mfc\Picturecredits\Domain\Repository\PictureTermsRepository;
use Mfc\Picturecredits\Type\MetadataFieldType;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Backend\Form\NodeFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;

/**
 * Class TermsRadioElement
 *
 * Custom field type that checks the configured picture terms toggle fields.
 *
 * @package Mfc\Picturecredits\Domain\Repository
 * @author Sebastian Klein <sebastian.klein@marketing-factory.de>
 */
class TermsRadioElement extends AbstractFormElement
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
     * @var PictureTermsRepository
     */
    protected $pictureTermsRepository;

    public function __construct(
        NodeFactory $nodeFactory
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->pictureTermsRepository = GeneralUtility::makeInstance(PictureTermsRepository::class);
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * This will render a series of radio buttons.
     *
     * @return array As defined in initializeResultArray() of AbstractNode
     */
    public function render(): array
    {
        $row = $this->data['databaseRow'];
        $resultArray = $this->initializeResultArray();

        $termsDefaultValue = 0;
        $prefixedFieldName = 'field_credits_on_image';

        // Don't render field if no picture terms are selected:
        if ((int)current($row['terms']) === 0) {
            return $resultArray = [];
        }

        try {
            $termsRecord = $this->pictureTermsRepository->findByTermsUid((int)current($row['terms']));
            $fieldName = $this->data['fieldName'];
            $prefixedFieldName = 'field_' . $this->data['fieldName'];

            if (array_key_exists($prefixedFieldName, $termsRecord)) {
                $fieldType = (int)$termsRecord[$prefixedFieldName];
                $termsDefaultValue = (int)$termsRecord[$fieldName];

                if ($fieldType === MetadataFieldType::HIDDEN) {
                    return $resultArray = [];
                }
            }
        } catch (\RuntimeException $ignoredException) {
            // deliberately empty
        } catch (DBALException $e) {
            return $resultArray = [];
        }

        $fieldInformationResult = $this->renderFieldInformation();
        $fieldInformationHtml = $fieldInformationResult['html'];
        $resultArray = $this->mergeChildReturnIntoExistingResult($resultArray, $fieldInformationResult, false);

        $fieldWizardResult = $this->renderFieldWizard();
        $fieldWizardHtml = $fieldWizardResult['html'];
        $resultArray = $this->mergeChildReturnIntoExistingResult($resultArray, $fieldWizardResult, false);

        $html = [];
        $html[] = '<div class="formengine-field-item t3js-formengine-field-item">';
        $html[] = $fieldInformationHtml;
        $html[] =   '<div class="form-wizards-wrap">';
        $html[] =       '<div class="form-wizards-element">';

        $labelDefault = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:picture_terms.' . $prefixedFieldName . '.option.default';
        $labelYes = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:picture_terms.' . $prefixedFieldName . '.option.yes';
        $labelNo = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:picture_terms.' . $prefixedFieldName . '.option.no';
        $labelDefaultValue = $termsDefaultValue === 1 ? $labelYes : $labelNo;

        $items = [
            0 => [
                'label' => $this->getLanguageService()->sL($labelDefault) . ' (' . $this->getLanguageService()->sL($labelDefaultValue) . ')',
                'value' => 0,
            ],
            1 => [
                'label' => $this->getLanguageService()->sL($labelYes),
                'value' => 1,
            ],
            2 => [
                'label' => $this->getLanguageService()->sL($labelNo),
                'value' => 2,
            ],
        ];

        foreach ($items as $itemNumber => $itemLabelAndValue) {
            $label = $itemLabelAndValue['label'];
            $value = $itemLabelAndValue['value'];
            $radioId = htmlspecialchars(StringUtility::getUniqueId('formengine-radio-') . '-' . $itemNumber);
            $radioElementAttrs = array_merge(
                [
                    'type' => 'radio',
                    'id' => $radioId,
                    'value' => $value,
                    'name' => $this->data['parameterArray']['itemFormElName'],
                ],
                $this->getOnFieldChangeAttrs('click', $this->data['parameterArray']['fieldChangeFunc'] ?? [])
            );

            if ((string)$value === (string)$this->data['parameterArray']['itemFormElValue']) {
                $radioElementAttrs['checked'] = 'checked';
            }

            $html[] = '<div class="radio">';
            $html[] =     '<label for="' . $radioId . '">';
            $html[] =     '<input ' . GeneralUtility::implodeAttributes($radioElementAttrs, true) . '>';
            $html[] =         htmlspecialchars($this->appendValueToLabelInDebugMode($label, $value));
            $html[] =     '</label>';
            $html[] = '</div>';
        }

        $html[] =       '</div>';

        if (!empty($fieldWizardHtml)) {
            $html[] =   '<div class="form-wizards-items-bottom">';
            $html[] =       $fieldWizardHtml;
            $html[] =   '</div>';
        }

        $html[] =   '</div>';
        $html[] = '</div>';

        $resultArray['html'] = $this->wrapWithFieldsetAndLegend(implode(LF, $html));
        return $resultArray;
    }
}
