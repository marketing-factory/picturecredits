<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Type;

enum MetadataFieldType: int
{
    case HIDDEN = 0;
    case OPTIONAL = 1;
    case MANDATORY = 2;
    case MANDATORY_IF_PRESENT = 3;

    public static function fromMixed(mixed $type): self
    {
        if ($type instanceof self) {
            return $type;
        }

        if ($type === null) {
            return self::HIDDEN;
        }

        if (is_string($type)) {
            $type = strtoupper($type);
        }

        if (is_int($type)) {
            return self::from($type);
        }

        if (is_string($type)) {
            return match ($type) {
                'HIDDEN' => self::HIDDEN,
                'OPTIONAL' => self::OPTIONAL,
                'MANDATORY' => self::MANDATORY,
                'MANDATORY_IF_PRESENT' => self::MANDATORY_IF_PRESENT,
                default => self::from((int)$type),
            };
        }

        return self::from((int)$type);
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
