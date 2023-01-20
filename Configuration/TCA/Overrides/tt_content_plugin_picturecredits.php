<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    return;
}

ExtensionUtility::registerPlugin(
    'Picturecredits',
    'Picturecredits',
    'Displays picture credits',
    'EXT:picturecredits/Resources/Public/Icons/Extension.svg',
);
