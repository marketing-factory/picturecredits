<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'module-picturecredits-legacy' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:picturecredits/Resources/Public/Icons/backend-module.svg'
    ],
    'module-picturecredits-theme' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:picturecredits/Resources/Public/Icons/backend-module-theme.svg'
    ],
    'content-picturecredits-plugin' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:picturecredits/Resources/Public/Icons/Extension.svg'
    ],
];
