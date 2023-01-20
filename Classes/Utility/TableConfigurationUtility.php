<?php

namespace Mfc\Picturecredits\Utility;

use Mfc\Picturecredits\Type\MetadataFieldType;
use TYPO3\CMS\Core\Utility\ArrayUtility;

/**
 * Class \Mfc\Picturecredits\Utility\TableConfigurationUtility
 */
class TableConfigurationUtility
{
    /**
     * @param string $fieldName
     * @param array $configurationOverrides
     *
     * @return array
     */
    public static function getFullMetadataFieldTCAConfig($fieldName, array $configurationOverrides = [])
    {
        $ll = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:';
        $fileFieldTCAConfig = [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => $ll . 'picture_terms.' . $fieldName,
            'description' => $ll . 'picture_terms.' . $fieldName . '.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$ll . 'type.metadata_field_type.hidden', MetadataFieldType::HIDDEN],
                    [$ll . 'type.metadata_field_type.optional', MetadataFieldType::OPTIONAL],
                    [$ll . 'type.metadata_field_type.mandatory', MetadataFieldType::MANDATORY],
                    [$ll . 'type.metadata_field_type.mandatory_if_present', MetadataFieldType::MANDATORY_IF_PRESENT],
                ],
            ],
        ];
        ArrayUtility::mergeRecursiveWithOverrule($fileFieldTCAConfig, $configurationOverrides);

        return $fileFieldTCAConfig;
    }

    /**
     * @param string $fieldName
     * @param array $configurationOverrides
     *
     * @return array
     */
    public static function getOptionalMetadataFieldTCAConfig($fieldName, array $configurationOverrides = [])
    {
        $ll = 'LLL:EXT:picturecredits/Resources/Private/Language/locallang_db.xlf:';
        $fileFieldTCAConfig = [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => $ll . 'picture_terms.' . $fieldName,
            'description' => $ll . 'picture_terms.' . $fieldName . '.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$ll . 'type.metadata_field_type.hidden', MetadataFieldType::HIDDEN],
                    [$ll . 'type.metadata_field_type.optional', MetadataFieldType::OPTIONAL],
                ],
            ],
        ];
        ArrayUtility::mergeRecursiveWithOverrule($fileFieldTCAConfig, $configurationOverrides);

        return $fileFieldTCAConfig;
    }
}
