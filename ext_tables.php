<?php

declare(strict_types=1);

use Mfc\Picturecredits\Controllers\BackendController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionManagementUtility::addModule(
    'picturecredits',
    '',
    'after:web',
    null,
    [
        'labels' => 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod.xlf',
        'name' => 'picturecredits',
        'iconIdentifier' => 'module-picturecredits-main',
    ]
);

// Module Picture Credits > Import
ExtensionUtility::registerModule(
    'Picturecredits',
    'picturecredits',
    'importDefaults',
    '',
    [
        BackendController::class => 'import,importDefaultRecords',
    ],
    [
        'labels' => 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod_import.xlf',
        'iconIdentifier' => 'module-picturecredits',
        'access' => 'admin',
    ]
);
