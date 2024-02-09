<?php

if (!defined('TYPO3')) {
    return;
}

use Mfc\Picturecredits\Utility\TableConfigurationUtility;

$table = 'picture_terms';
$coreLL = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:';
$extLL = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $extLL . $table,
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'rootLevel' => 1,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby' => 'ORDER BY sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:picturecredits/Resources/Public/Icons/' . $table . '.svg',
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => $coreLL . 'LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => $coreLL . 'LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => $table,
                'foreign_table_where' => 'AND ' . $table . '.pid=###CURRENT_PID### AND ' .
                    $table . '.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'label' => $coreLL . 'LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
                    ]
                ]
            ]
        ],
        'name' => [
            'label' => $extLL . $table . '.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'trim',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'template_name' => [
            'l10n_mode' => 'exclude',
            'label' => $extLL . $table . '.template_name',
            'description' => $extLL . $table . '.template_name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'trim,alphanum,nospace,lower',
                'valuePicker' => [
                    'items' => [
                        [ 'Default', 'Default', ],
                        [ 'All rights reserved', 'AllRightsReserved', ],
                    ],
                ],
            ],
        ],
        'vendor_name' => [
            'label' => $extLL . $table . '.field_vendor_name',
            'description' => $extLL . $table . '.field_vendor_name.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'vendor_link' => [
            'label' => $extLL . $table . '.field_vendor_link',
            'description' => $extLL . $table . '.field_vendor_link.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'vendor_collection' => [
            'label' => $extLL . $table . '.field_vendor_collection',
            'description' => $extLL . $table . '.field_vendor_collection.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'disclaimer' => [
            'label' => $extLL . $table . '.field_disclaimer',
            'description' => $extLL . $table . '.field_disclaimer.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'creator_name' => [
            'label' => $extLL . $table . '.field_creator_name',
            'description' => $extLL . $table . '.field_creator_name.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'creator_link' => [
            'label' => $extLL . $table . '.field_creator_link',
            'description' => $extLL . $table . '.field_creator_link.description',
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
            ],
        ],
        'license_name' => [
            'label' => $extLL . $table . '.field_license_name',
            'description' => $extLL . $table . '.field_license_name.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        'license_link' => [
            'label' => $extLL . $table . '.field_license_link',
            'description' => $extLL . $table . '.field_license_link.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
                'default' => '',
                ['behaviour' => ['allowLanguageSynchronization' => true]],
            ],
        ],
        // Picture
        'field_picture_name' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_picture_name'),
        'field_picture_link' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_picture_link'),
        // Disclaimer
        'field_disclaimer' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_disclaimer'),
        // Creator
        'field_creator_name' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_creator_name'),
        'field_creator_link' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_creator_link'),
        // Vendor
        'field_vendor_name' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_vendor_name'),
        'field_vendor_collection' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_vendor_collection'),
        'field_vendor_link' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_vendor_link'),
        // License
        'field_license_name' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_license_name'),
        'field_license_link' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_license_link'),
        // Publisher
        'field_publisher_name' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_publisher_name'),
        // Image postprocessing
        'field_additional_info' => TableConfigurationUtility::getFullMetadataFieldTCAConfig('field_additional_info'),
    ],
    'types' => [
        0 => [
            'showitem' => 'name, template_name,
                --div--;' . $extLL . $table . '.tabs.default_fields,
                --palette--;' . $extLL . $table . '.palette.vendor;default_vendor,
                --palette--;' . $extLL . $table . '.palette.creator;default_creator,
                --palette--;' . $extLL . $table . '.palette.license;default_license,
                --palette--;' . $extLL . $table . '.palette.disclaimer;default_disclaimer,
                --div--;' . $extLL . $table . '.tabs.override_fields,
                --palette--;' . $extLL . $table . '.palette.vendor;override_vendor,
                --palette--;' . $extLL . $table . '.palette.picture;override_picture,
                --palette--;' . $extLL . $table . '.palette.creator;override_creator,
                --palette--;' . $extLL . $table . '.palette.license;override_license,
                --palette--;' . $extLL . $table . '.palette.publisher;override_publisher,
                --palette--;' . $extLL . $table . '.palette.disclaimer;override_disclaimer,
                --palette--;' . $extLL . $table . '.palette.other;override_other,
            ',
        ],
    ],
    'palettes' => [
        'default_vendor' => [
            'description' => $extLL . $table . '.tabs.default_fields.description',
            'showitem' => 'vendor_name, vendor_link, --linebreak--, vendor_collection,',
        ],
        'default_creator' => [
            'showitem' => 'creator_name, creator_link,',
        ],
        'default_license' => [
            'showitem' => 'license_name, license_link,',
        ],
        'default_disclaimer' => [
            'showitem' => 'disclaimer,',
        ],
        'override_vendor' => [
            'description' => $extLL . $table . '.tabs.override_fields.description',
            'showitem' => 'field_vendor_name, field_vendor_link, --linebreak--, field_vendor_collection,',
        ],
        'override_picture' => [
            'showitem' => 'field_picture_name, field_picture_link,',
        ],
        'override_disclaimer' => [
            'showitem' => 'field_disclaimer,',
        ],
        'override_creator' => [
            'showitem' => 'field_creator_name, field_creator_link,',
        ],
        'override_license' => [
            'showitem' => 'field_license_name, field_license_link,',
        ],
        'override_publisher' => [
            'showitem' => 'field_publisher_name,',
        ],
        'override_other' => [
            'showitem' => 'field_additional_info,',
        ],
    ],
];
