<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Trait;

use Berbeflo\ModifyDump\Attribute\Dump;
use ReflectionClass;
use ReflectionProperty;

trait ModifiedDump
{
    public function __debugInfo() : array
    {
        $out = [];

        $reflectionClass = new ReflectionClass($this);
        $propertiesToShow = array_filter($reflectionClass->getProperties(), fn (ReflectionProperty $property) => count($property->getAttributes(Dump::class)) > 0);

        foreach ($propertiesToShow as $property) {
            $attribute = $property->getAttributes(Dump::class)[0];
            $attributeObject = $attribute->newInstance();
            $formatter = $attributeObject->createFormatter($property, $this);

            $out[$formatter->getIdentifier()] = $formatter->getValue();
        }

        return $out;
    }
}