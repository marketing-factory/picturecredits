<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Model;

use TYPO3\CMS\Core\Resource\FileReference as BaseFileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * Class ResolvedPictureTerms
 * @package Mfc\Picturecredits\Domain\Model
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class ResolvedPictureTerms extends AbstractValueObject
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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ResolvedPictureTerms
     */
    public function setName(string $name): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setTemplateName(string $templateName): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setDisclaimer(string $disclaimer): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setCreatorName(string $creatorName): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setCreatorLink(string $creatorLink): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setVendorName(string $vendorName): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setVendorCollection(string $vendorCollection): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setVendorLink(string $vendorLink): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setLicenseName(string $licenseName): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setLicenseLink(string $licenseLink): ResolvedPictureTerms
    {
        $this->licenseLink = $licenseLink;
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
     * @return ResolvedPictureTerms
     */
    public function setSocialmediaUsage(int $socialmediaUsage): ResolvedPictureTerms
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
     * @return ResolvedPictureTerms
     */
    public function setCreditsOnImage(int $creditsOnImage): ResolvedPictureTerms
    {
        $this->creditsOnImage = $creditsOnImage;
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
     * @return ResolvedPictureTerms
     */
    public function setPublisherName(string $publisherName): ResolvedPictureTerms
    {
        $this->publisherName = $publisherName;
        return $this;
    }
}
