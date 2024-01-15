<?php

use Mfc\Picturecredits\Controllers\BackendController;

return [
    'picturecredits' => [
        'parent' => 'tools',
        'position' => ['after' => 'tools_ExtensionmanagerExtensionmanager'],
        'access' => 'systemMaintainer',
        'workspaces' => 'live',
        'iconIdentifier' => 'module-picturecredits',
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
