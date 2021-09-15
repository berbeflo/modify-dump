<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Control;

use ReflectionClass;
use ReflectionProperty;
use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Attribute\Option;

class DumpBuilder
{
    private ReflectionClass $reflectionClass;
    private Options $options;

    public function __construct(
        private object $context,
    ) {
        $this->reflectionClass = new ReflectionClass($context);
        $this->options = new Options();
    }

    public function parseDumpOptions() : self
    {
        foreach ($this->reflectionClass->getAttributes(Option::class) as $option) {
            $optionObject = $option->newInstance();
            $identifier = $optionObject->getIdentifier();
            $optionValue = $optionObject->getValue();

            $methodName = 'set' . implode('', array_map('ucfirst', explode('-', $identifier)));
            $this->options->{$methodName}($optionValue);
        }

        return $this;
    }

    public function fetch() : array
    {
        $out = [];
        $propertiesToShow = array_filter($this->reflectionClass->getProperties(), fn (ReflectionProperty $property) => count($property->getAttributes(Dump::class)) > 0);

        foreach ($propertiesToShow as $property) {
            $attribute = $property->getAttributes(Dump::class)[0];
            $attributeObject = $attribute->newInstance();
            $formatter = $attributeObject->createFormatter($this->options, $property, $this->context);

            $out[$formatter->getIdentifier()] = $formatter->getValue();
        }

        return $out;
    }
}
