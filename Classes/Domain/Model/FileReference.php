<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference as BaseFileReference;

/**
 * Class FileReference
 * @package Mfc\Picturecredits\Domain\Model
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
class FileReference extends BaseFileReference
{
    protected int $uidForeign = 0;
    protected string $tablenames = '';
    protected string $fieldname = '';

    /**
     * @return int
     */
    public function getUidForeign(): int
    {
        return $this->uidForeign;
    }

    /**
     * @param int $uidForeign
     * @return FileReference
     */
    public function setUidForeign(int $uidForeign): FileReference
    {
        $this->uidForeign = $uidForeign;
        return $this;
    }

    /**
     * @return string
     */
    public function getTablenames(): string
    {
        return $this->tablenames;
    }

    /**
     * @param string $tablenames
     * @return FileReference
     */
    public function setTablenames(string $tablenames): FileReference
    {
        $this->tablenames = $tablenames;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldname(): string
    {
        return $this->fieldname;
    }

    /**
     * @param string $fieldname
     * @return FileReference
     */
    public function setFieldname(string $fieldname): FileReference
    {
        $this->fieldname = $fieldname;
        return $this;
    }
}
