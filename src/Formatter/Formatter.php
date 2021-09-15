<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Formatter;

use ReflectionProperty;
use Berbeflo\ModifyDump\State\Uninitialized;

class Formatter
{
    public function __construct(
        protected ReflectionProperty $property,
        protected object $context
    ) {}

    public function getIdentifier() : string
    {
        return $this->property->getName();
    }

    public function getValue() : mixed
    {
        $this->property->setAccessible(true);
        if (!$this->property->isInitialized($this->context)) {
            return new Uninitialized();
        }
        return $this->property->getValue($this->context);
    }
}
