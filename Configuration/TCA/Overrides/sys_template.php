<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3')) {
    return;
}

call_user_func(function () {
    ExtensionManagementUtility::addStaticFile(
        'picturecredits',
        'Configuration/TypoScript',
        'Picture credits'
    );
});
