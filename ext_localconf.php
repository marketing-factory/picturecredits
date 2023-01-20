<?php

use Mfc\Picturecredits\Controllers\PictureCreditsController;
use Mfc\Picturecredits\Form\Element\TermsInputElement;
use Mfc\Picturecredits\Form\Element\TermsRadioElement;
use Mfc\Picturecredits\Updates\MigratePictureVendorIntoPictureTermsWizard;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$boot = static function (): void {
    ExtensionUtility::configurePlugin(
        'PictureCredits',
        'PictureCredits',
        [
            PictureCreditsController::class => 'show',
        ],
        [
            PictureCreditsController::class => 'show',
        ],
    );

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1660899595] = [
        'nodeName' => 'termsInput',
        'priority' => 40,
        'class' => TermsInputElement::class,
    ];

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1660899596] = [
        'nodeName' => 'termsRadio',
        'priority' => 40,
        'class' => TermsRadioElement::class,
    ];

    // Upgrade wizards
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['picturecredits_MigratePictureVendorIntoPictureTermsWizard'] = MigratePictureVendorIntoPictureTermsWizard::class;
};

$boot();
unset($boot);
