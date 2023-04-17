<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Controllers;


use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\CsvUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class BackendController extends ActionController {
    protected ModuleTemplateFactory $moduleTemplateFactory;

    /**
     * Keeps fieldnames of picture_terms table.
     *
     * @var array
     */
    protected static array $fieldNames = [
        'uid',
        'pid',
        'sys_language_uid',
        'name',
        'template_name',
        'disclaimer',
        'creator_name',
        'creator_link',
        'vendor_name',
        'vendor_collection',
        'vendor_link',
        'license_name',
        'license_link',
        'publisher_name',
        'socialmedia_usage',
        'credits_on_image',
        'field_picture_name',
        'field_picture_link',
        'field_disclaimer',
        'field_creator_name',
        'field_creator_link',
        'field_vendor_name',
        'field_vendor_collection',
        'field_vendor_link',
        'field_license_name',
        'field_license_link',
        'field_publisher_name',
        'field_additional_info',
        'field_socialmedia_usage',
        'field_credits_on_image',
    ];

    public function __construct(
        ModuleTemplateFactory $moduleTemplateFactory
    ) {
        $this->moduleTemplateFactory = $moduleTemplateFactory;
    }

    public function importAction(): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $moduleTemplate->setContent($this->view->render());
        return $this->htmlResponse($moduleTemplate->renderContent());
    }

    public function importDefaultRecordsAction(): ResponseInterface
    {
        $tableName = 'picture_terms';
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName);

        // Delete all existing records:
        $connectionPool->truncate($tableName);

        // Import preconfigured records:
        $importFile = GeneralUtility::getFileAbsFileName('EXT:picturecredits/Resources/Private/Import/default-terms.csv');
        $lines = file($importFile);
        foreach ($lines as $line) {
            $values = CsvUtility::csvToArray($line, ',', '\'');
            foreach ($values as $value) {
                $insert = array_combine(self::$fieldNames, $value);
                $connectionPool->insert($tableName, $insert);
            }
        }

        $this->addFlashMessage(
            LocalizationUtility::translate('LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod_import.xlf:module.import.flashmessage.importSuccess.body'),
            LocalizationUtility::translate('LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod_import.xlf:module.import.flashmessage.importSuccess.title')
        );

        return new ForwardResponse('import');
    }
}
