<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

if (!defined('TYPO3')) {
    return;
}

call_user_func(function () {
    $table = 'sys_file_metadata';
    $termsTable = 'picture_terms';
    $extLL = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:';

    $fields = [
        'terms' => [
            'label' => $extLL . 'sys_file_metadata_item.terms',
            'description' => $extLL . 'sys_file_metadata_item.terms.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'picture_terms',
                'foreign_table_where' => 'AND {#picture_terms}.{#pid} = 0 AND {#picture_terms}.{#l10n_parent} = 0',
                'default' => 0,
            ],
            'onChange' => 'reload',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'vendor_name' => [
            'label' => $extLL . 'picture_terms.field_vendor_name',
            'description' => $extLL . 'picture_terms.field_vendor_name.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'vendor_link' => [
            'label' => $extLL . 'picture_terms.field_vendor_link',
            'description' => $extLL . 'picture_terms.field_vendor_link.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'vendor_collection' => [
            'label' => $extLL . 'picture_terms.field_vendor_collection',
            'description' => $extLL . 'picture_terms.field_vendor_collection.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'picture_name' => [
            'label' => $extLL . 'picture_terms.field_picture_name',
            'description' => $extLL . 'picture_terms.field_picture_name.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'picture_link' => [
            'label' => $extLL . 'picture_terms.field_picture_link',
            'description' => $extLL . 'picture_terms.field_picture_link.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'disclaimer' => [
            'label' => $extLL . 'picture_terms.field_disclaimer',
            'description' => $extLL . 'picture_terms.field_disclaimer.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'creator_name' => [
            'label' => $extLL . 'picture_terms.field_creator_name',
            'description' => $extLL . 'picture_terms.field_creator_name.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'creator_link' => [
            'label' => $extLL . 'picture_terms.field_creator_link',
            'description' => $extLL . 'picture_terms.field_creator_link.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'license_name' => [
            'label' => $extLL . 'picture_terms.field_license_name',
            'description' => $extLL . 'picture_terms.field_license_name.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'license_link' => [
            'label' => $extLL . 'picture_terms.field_license_link',
            'description' => $extLL . 'picture_terms.field_license_link.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'publisher_name' => [
            'label' => $extLL . 'picture_terms.field_publisher_name',
            'description' => $extLL . 'picture_terms.field_publisher_name.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'additional_info' => [
            'label' => $extLL . 'picture_terms.field_additional_info',
            'description' => $extLL . 'picture_terms.field_additional_info.description',
            'config' => [
                'type' => 'user',
                'renderType' => 'termsInput',
                'size' => 50,
                'max' => 2000,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'note' => [
            'label' => $extLL . 'sys_file_metadata_item.note',
            'description' => $extLL . 'sys_file_metadata_item.note.description',
            'config' => [
                'type' => 'text',
                'size' => 50,
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns('sys_file_metadata', $fields);

    // Only if EXT:filemetadata is not installed, we need to configure file type "2" (images) here.
    // Otherwise, this 'showitem' list would overwrite the extension's field list.
    if (!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('filemetadata')) {
        $GLOBALS['TCA']['sys_file_metadata'] = array_replace_recursive($GLOBALS['TCA']['sys_file_metadata'], [
            'types' => [
                '2' => ['showitem' => '
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                        fileinfo, alternative, description, title, --palette--;;language,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                        categories,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                '],
            ]
        ]);
    }

    // Add custom fields only for files of type "2" (images):
    ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        '
        --div--;' . $extLL . 'sys_file_metadata.tabs.picturecredits,
            terms,
            --palette--;' . $extLL . $termsTable . '.palette.picture;picture;;,
            --palette--;' . $extLL . $termsTable . '.palette.creator;creator;;,
            --palette--;' . $extLL . $termsTable . '.palette.vendor;vendor;;,
            --palette--;' . $extLL . $termsTable . '.palette.license;license;;,
            --palette--;' . $extLL . $termsTable . '.palette.publisher;publisher;;,
            --palette--;' . $extLL . $termsTable . '.palette.disclaimer;disclaimer;;,
            --palette--;' . $extLL . $termsTable . '.palette.other;other;;,
            --palette--;' . $extLL . $termsTable . '.palette.internal;internal;;
        ',
        '2',
        ''
    );

    $GLOBALS['TCA'][$table]['palettes']['picture'] = [
        'showitem' => 'picture_name, picture_link',
    ];

    $GLOBALS['TCA'][$table]['palettes']['disclaimer'] = [
        'showitem' => 'disclaimer',
    ];

    $GLOBALS['TCA'][$table]['palettes']['creator'] = [
        'showitem' => 'creator_name, creator_link',
    ];

    $GLOBALS['TCA'][$table]['palettes']['vendor'] = [
        'showitem' => 'vendor_name, vendor_link, --linebreak--, vendor_collection',
    ];

    $GLOBALS['TCA'][$table]['palettes']['license'] = [
        'showitem' => 'license_name, license_link',
    ];

    $GLOBALS['TCA'][$table]['palettes']['publisher'] = [
        'showitem' => 'publisher_name',
    ];

    $GLOBALS['TCA'][$table]['palettes']['other'] = [
        'showitem' => 'additional_info',
    ];

    $GLOBALS['TCA'][$table]['palettes']['internal'] = [
        'showitem' => 'note',
    ];


    $hideDisabledTermsInMetadata = (bool)GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('picturecredits', 'hideDisabledTermsInMetadata');
    if ($hideDisabledTermsInMetadata) {
        $GLOBALS['TCA'][$table]['columns']['terms']['config']['foreign_table_where'] = 'AND {#picture_terms}.{#pid} = 0 AND {#picture_terms}.{#l10n_parent} = 0 AND {#picture_terms}.{#hidden} = 0';
    }
});
