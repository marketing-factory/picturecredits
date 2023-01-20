<?php

declare(strict_types=1);

namespace Mfc\Picturecredits\Domain\Types;

/**
 * Class TermsFieldType
 * @package Mfc\Picturecredits\Domain\Types
 * @author Christian Spoo <christian.spoo@marketing-factory.de>
 */
final class TermsFieldType
{
    public const HIDDEN = 0;
    public const OPTIONAL = 1;
    public const MANDATORY = 2;
    public const MANDATORY_IF_SPECIFIED = 3;
}
