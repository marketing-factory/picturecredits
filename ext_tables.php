<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
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
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'Picturecredits',
    'picturecredits',
    'importDefaults',
    '',
    [
        \Mfc\Picturecredits\Controllers\BackendController::class => 'import,importDefaultRecords',
    ],
    [
        'labels' => 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod_import.xlf',
        'iconIdentifier' => 'module-picturecredits',
        'access' => 'admin',
    ]
);
