<?php

use Mfc\Picturecredits\Controllers\PictureCreditsController;
use Mfc\Picturecredits\Form\Element\TermsInputElement;
use Mfc\Picturecredits\Form\Element\TermsRadioElement;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
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

    ExtensionManagementUtility::addTypoScriptSetup(
        trim('
            module.tx_picturecredits {
                view {
                    templateRootPaths {
                        10 = EXT:picturecredits/Resources/Private/Templates/Backend/
                    }
                    layoutRootPaths {
                       10 = EXT:picturecredits/Resources/Private/Layouts/Backend/
                    }
                }
            }
         ')
    );
};

$boot();
unset($boot);
