<?php

namespace Mfc\Picturecredits\Type;

use TYPO3\CMS\Core\Type\Enumeration;

/**
 * Class \Mfc\Picturecredits\Type\MetadataFieldType
 */
class MetadataFieldType extends Enumeration
{
    // phpcs:ignore
    const __default = self::HIDDEN;

    /**
     * Constants reflecting the table column type
     */
    const HIDDEN = 0;
    const OPTIONAL = 1;
    const MANDATORY = 2;
    const MANDATORY_IF_PRESENT = 3;

    /**
     * @param mixed $type
     */
    public function __construct($type = null)
    {
        if ($type !== null) {
            $type = strtoupper((string)$type);
        }

        parent::__construct($type);
    }

    /**
     * @return int
     */
    public function __toInt()
    {
        return (int)$this->value;
    }
}
