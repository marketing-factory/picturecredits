<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Model;

use Mfc\Picturecredits\Domain\Types\TermsFieldType;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class PictureTerms
 * @package Mfc\Picturecredits\Domain\Model
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class PictureTerms extends AbstractEntity
{
    protected string $name = '';
    protected string $templateName = '';
    protected string $disclaimer = '';
    protected string $creatorName = '';
    protected string $creatorLink = '';
    protected string $vendorName = '';
    protected string $vendorCollection = '';
    protected string $vendorLink = '';
    protected string $licenseName = '';
    protected string $licenseLink = '';
    protected string $publisherName = '';
    protected int $socialmediaUsage = 0;
    protected int $creditsOnImage = 0;
    protected int $fieldPictureName = TermsFieldType::HIDDEN;
    protected int $fieldPictureLink = TermsFieldType::HIDDEN;
    protected int $fieldDisclaimer = TermsFieldType::HIDDEN;
    protected int $fieldCreatorName = TermsFieldType::HIDDEN;
    protected int $fieldCreatorLink = TermsFieldType::HIDDEN;
    protected int $fieldVendorName = TermsFieldType::HIDDEN;
    protected int $fieldVendorCollection = TermsFieldType::HIDDEN;
    protected int $fieldVendorLink = TermsFieldType::HIDDEN;
    protected int $fieldLicenseName = TermsFieldType::HIDDEN;
    protected int $fieldLicenseLink = TermsFieldType::HIDDEN;
    protected int $fieldPublisherName = TermsFieldType::HIDDEN;
    protected int $fieldAdditionalInfo = TermsFieldType::HIDDEN;
    protected int $fieldSocialmediaUsage = TermsFieldType::HIDDEN;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PictureTerms
     */
    public function setName(string $name): PictureTerms
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    /**
     * @param string $templateName
     * @return PictureTerms
     */
    public function setTemplateName(string $templateName): PictureTerms
    {
        $this->templateName = $templateName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisclaimer(): string
    {
        return $this->disclaimer;
    }

    /**
     * @param string $disclaimer
     * @return PictureTerms
     */
    public function setDisclaimer(string $disclaimer): PictureTerms
    {
        $this->disclaimer = $disclaimer;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorName(): string
    {
        return $this->creatorName;
    }

    /**
     * @param string $creatorName
     * @return PictureTerms
     */
    public function setCreatorName(string $creatorName): PictureTerms
    {
        $this->creatorName = $creatorName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorLink(): string
    {
        return $this->creatorLink;
    }

    /**
     * @param string $creatorLink
     * @return PictureTerms
     */
    public function setCreatorLink(string $creatorLink): PictureTerms
    {
        $this->creatorLink = $creatorLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getVendorName(): string
    {
        return $this->vendorName;
    }

    /**
     * @param string $vendorName
     * @return PictureTerms
     */
    public function setVendorName(string $vendorName): PictureTerms
    {
        $this->vendorName = $vendorName;
        return $this;
    }

    /**
     * @return string
     */
    public function getVendorCollection(): string
    {
        return $this->vendorCollection;
    }

    /**
     * @param string $vendorCollection
     * @return PictureTerms
     */
    public function setVendorCollection(string $vendorCollection): PictureTerms
    {
        $this->vendorCollection = $vendorCollection;
        return $this;
    }

    /**
     * @return string
     */
    public function getVendorLink(): string
    {
        return $this->vendorLink;
    }

    /**
     * @param string $vendorLink
     * @return PictureTerms
     */
    public function setVendorLink(string $vendorLink): PictureTerms
    {
        $this->vendorLink = $vendorLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getLicenseName(): string
    {
        return $this->licenseName;
    }

    /**
     * @param string $licenseName
     * @return PictureTerms
     */
    public function setLicenseName(string $licenseName): PictureTerms
    {
        $this->licenseName = $licenseName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLicenseLink(): string
    {
        return $this->licenseLink;
    }

    /**
     * @param string $licenseLink
     * @return PictureTerms
     */
    public function setLicenseLink(string $licenseLink): PictureTerms
    {
        $this->licenseLink = $licenseLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublisherName(): string
    {
        return $this->publisherName;
    }

    /**
     * @param string $publisherName
     * @return PictureTerms
     */
    public function setPublisherName(string $publisherName): PictureTerms
    {
        $this->publisherName = $publisherName;
        return $this;
    }

    /**
     * @return int
     */
    public function getSocialmediaUsage(): int
    {
        return $this->socialmediaUsage;
    }

    /**
     * @param int $socialmediaUsage
     * @return PictureTerms
     */
    public function setSocialmediaUsage(int $socialmediaUsage): PictureTerms
    {
        $this->socialmediaUsage = $socialmediaUsage;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsOnImage(): int
    {
        return $this->creditsOnImage;
    }

    /**
     * @param int $creditsOnImage
     * @return PictureTerms
     */
    public function setCreditsOnImage(int $creditsOnImage): PictureTerms
    {
        $this->creditsOnImage = $creditsOnImage;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldPictureName(): int
    {
        return $this->fieldPictureName;
    }

    /**
     * @param int $fieldPictureName
     * @return PictureTerms
     */
    public function setFieldPictureName(int $fieldPictureName): PictureTerms
    {
        $this->fieldPictureName = $fieldPictureName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldPictureLink(): int
    {
        return $this->fieldPictureLink;
    }

    /**
     * @param int $fieldPictureLink
     * @return PictureTerms
     */
    public function setFieldPictureLink(int $fieldPictureLink): PictureTerms
    {
        $this->fieldPictureLink = $fieldPictureLink;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldDisclaimer(): int
    {
        return $this->fieldDisclaimer;
    }

    /**
     * @param int $fieldDisclaimer
     * @return PictureTerms
     */
    public function setFieldDisclaimer(int $fieldDisclaimer): PictureTerms
    {
        $this->fieldDisclaimer = $fieldDisclaimer;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldCreatorName(): int
    {
        return $this->fieldCreatorName;
    }

    /**
     * @param int $fieldCreatorName
     * @return PictureTerms
     */
    public function setFieldCreatorName(int $fieldCreatorName): PictureTerms
    {
        $this->fieldCreatorName = $fieldCreatorName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldCreatorLink(): int
    {
        return $this->fieldCreatorLink;
    }

    /**
     * @param int $fieldCreatorLink
     * @return PictureTerms
     */
    public function setFieldCreatorLink(int $fieldCreatorLink): PictureTerms
    {
        $this->fieldCreatorLink = $fieldCreatorLink;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldVendorName(): int
    {
        return $this->fieldVendorName;
    }

    /**
     * @param int $fieldVendorName
     * @return PictureTerms
     */
    public function setFieldVendorName(int $fieldVendorName): PictureTerms
    {
        $this->fieldVendorName = $fieldVendorName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldVendorCollection(): int
    {
        return $this->fieldVendorCollection;
    }

    /**
     * @param int $fieldVendorCollection
     * @return PictureTerms
     */
    public function setFieldVendorCollection(int $fieldVendorCollection): PictureTerms
    {
        $this->fieldVendorCollection = $fieldVendorCollection;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldVendorLink(): int
    {
        return $this->fieldVendorLink;
    }

    /**
     * @param int $fieldVendorLink
     * @return PictureTerms
     */
    public function setFieldVendorLink(int $fieldVendorLink): PictureTerms
    {
        $this->fieldVendorLink = $fieldVendorLink;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldLicenseName(): int
    {
        return $this->fieldLicenseName;
    }

    /**
     * @param int $fieldLicenseName
     * @return PictureTerms
     */
    public function setFieldLicenseName(int $fieldLicenseName): PictureTerms
    {
        $this->fieldLicenseName = $fieldLicenseName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldLicenseLink(): int
    {
        return $this->fieldLicenseLink;
    }

    /**
     * @param int $fieldLicenseLink
     * @return PictureTerms
     */
    public function setFieldLicenseLink(int $fieldLicenseLink): PictureTerms
    {
        $this->fieldLicenseLink = $fieldLicenseLink;
        return $this;
    }
    /**
     * @return int
     */
    public function getFieldPublisherName(): int
    {
        return $this->fieldPublisherName;
    }

    /**
     * @param int $fieldPublisherName
     * @return PictureTerms
     */
    public function setFieldPublisherName(int $fieldPublisherName): PictureTerms
    {
        $this->fieldPublisherName = $fieldPublisherName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldAdditionalInfo(): int
    {
        return $this->fieldAdditionalInfo;
    }

    /**
     * @param int $fieldAdditionalInfo
     * @return PictureTerms
     */
    public function setFieldAdditionalInfo(int $fieldAdditionalInfo): PictureTerms
    {
        $this->fieldAdditionalInfo = $fieldAdditionalInfo;
        return $this;
    }

    /**
     * @return int
     */
    public function getFieldSocialmediaUsage(): int
    {
        return $this->fieldSocialmediaUsage;
    }

    /**
     * @param int $fieldSocialmediaUsage
     * @return PictureTerms
     */
    public function setFieldSocialmediaUsage(int $fieldSocialmediaUsage): PictureTerms
    {
        $this->fieldSocialmediaUsage = $fieldSocialmediaUsage;
        return $this;
    }
}
