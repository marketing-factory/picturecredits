<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3')) {
    return;
}

ExtensionUtility::registerPlugin(
    'Picturecredits',
    'PictureCredits',
    'Displays picture credits',
    'content-picturecredits-plugin',
);
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['picturecredits_picturecredits'] = 'content-picturecredits-plugin';
