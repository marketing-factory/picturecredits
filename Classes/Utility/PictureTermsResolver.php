<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Utility;

use Mfc\Picturecredits\Domain\Model\PictureTerms;
use Mfc\Picturecredits\Domain\Model\ResolvedPictureTerms;
use Mfc\Picturecredits\Type\MetadataFieldType;
use Symfony\Component\PropertyAccess\PropertyAccess;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

/**
 * Class PictureTermsResolver
 * @package Mfc\Picturecredits\Utility
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class PictureTermsResolver
{
    private const FIELDS = [
        [
            'metadata_field' => '[vendor_collection]',
            'terms_property' => 'vendorCollection',
            'control_property' => 'fieldVendorCollection',
        ],
        [
            'metadata_field' => '[vendor_link]',
            'terms_property' => 'vendorLink',
            'control_property' => 'fieldVendorLink',
        ],
        [
            'metadata_field' => '[vendor_name]',
            'terms_property' => 'vendorName',
            'control_property' => 'fieldVendorName',
        ],
        [
            'metadata_field' => '[creator_name]',
            'terms_property' => 'creatorName',
            'control_property' => 'fieldCreatorName',
        ],
        [
            'metadata_field' => '[creator_link]',
            'terms_property' => 'creatorLink',
            'control_property' => 'fieldCreatorLink',
        ],
        [
            'metadata_field' => '[license_name]',
            'terms_property' => 'licenseName',
            'control_property' => 'fieldLicenseName',
        ],
        [
            'metadata_field' => '[license_link]',
            'terms_property' => 'licenseLink',
            'control_property' => 'fieldLicenseLink',
        ],
        [
            'metadata_field' => '[publisher_name]',
            'terms_property' => 'publisherName',
            'control_property' => 'fieldPublisherName',
        ],
        [
            'metadata_field' => '[disclaimer]',
            'terms_property' => 'disclaimer',
            'control_property' => 'fieldDisclaimer',
        ],
    ];

    public static function resolveFromFileAndTerms(
        FileReference $fileReference,
        PictureTerms $terms
    ): ResolvedPictureTerms {
        $accessor = PropertyAccess::createPropertyAccessor();
        $fileProperties = $fileReference->getOriginalResource()->getProperties();

        $resolvedTerms = new ResolvedPictureTerms();
        foreach (self::FIELDS as $fieldConfig) {
            $fileValue = $accessor->getValue($fileProperties, $fieldConfig['metadata_field']);
            $fallbackValue = $accessor->getValue($terms, $fieldConfig['terms_property']);
            $controlPropertyValue = $accessor->getValue($terms, $fieldConfig['control_property']);

            $resolvedValue = '';
            switch ($controlPropertyValue) {
                case MetadataFieldType::MANDATORY:
                case MetadataFieldType::MANDATORY_IF_PRESENT:
                case MetadataFieldType::OPTIONAL:
                    $resolvedValue = !empty($fileValue) ? $fileValue : $fallbackValue;
                    break;
                case MetadataFieldType::HIDDEN:
                    $resolvedValue = $fallbackValue;
                    break;
            }

            $accessor->setValue($resolvedTerms, $fieldConfig['terms_property'], $resolvedValue);
        }

        return $resolvedTerms;
    }
}
