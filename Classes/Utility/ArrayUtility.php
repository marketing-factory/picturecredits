<?php

namespace Mfc\Picturecredits\Utility;

use Symfony\Component\PropertyAccess\PropertyAccess;

readonly class ArrayUtility
{
    public static function uniqueObjectsByProperty(array $array, string $property): array
    {
        $valuesSeen = [];
        $accessor = PropertyAccess::createPropertyAccessor();

        return array_filter(
            $array,
            static function (mixed $element) use (&$valuesSeen, $property, $accessor) {
                $propertyValue = $accessor->getValue($element, $property);
                if (isset($valuesSeen[$propertyValue])) {
                    return false;
                }

                $valuesSeen[$propertyValue] = true;
                return true;
            }
        );
    }
}
