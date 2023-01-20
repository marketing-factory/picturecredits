<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Model;

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * Class PictureCredit
 * @package Mfc\Picturecredits\Domain\Model
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class PictureCredit extends AbstractDomainObject
{
    public function __construct(
        private File $file,
        private ?string $title,
    ) {
    }

    /**
     * @return File
     */
    public function getFile(): File
    {
        return $this->file;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
}
