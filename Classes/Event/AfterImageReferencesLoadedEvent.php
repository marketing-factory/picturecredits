<?php

namespace Mfc\Picturecredits\Event;

use Mfc\Picturecredits\Domain\Model\FileReference;

final class AfterImageReferencesLoadedEvent
{
    /**
     * @param FileReference[]|array $fileReferences
     */
    public function __construct(private array $fileReferences)
    {
    }

    public function getFileReferences(): array
    {
        return $this->fileReferences;
    }

    public function setFileReferences(array $fileReferences): self
    {
        $this->fileReferences = $fileReferences;
        return $this;
    }
}
