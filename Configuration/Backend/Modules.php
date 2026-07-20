<?php

use Mfc\Picturecredits\Controllers\BackendController;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

$typo3Version = VersionNumberUtility::convertVersionNumberToInteger(
    VersionNumberUtility::getCurrentTypo3Version()
);
$moduleIconIdentifier = $typo3Version < 14000000
    ? 'module-picturecredits-legacy'
    : 'module-picturecredits-theme';

return [
    'picturecredits' => [
        'parent' => 'tools',
        'position' => ['after' => 'tools_ExtensionmanagerExtensionmanager'],
        'access' => 'systemMaintainer',
        'workspaces' => 'live',
        'iconIdentifier' => $moduleIconIdentifier,
        'path' => '/module/picturecredits/import',
        'labels' => 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_mod.xlf',
        'extensionName' => 'Picturecredits',
        'controllerActions' => [
            BackendController::class => [
                'import', 'importDefaultRecords'
            ],
        ],
    ],
];
