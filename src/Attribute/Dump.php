<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;
use Berbeflo\ModifyDump\Formatter\Formatter;
use InvalidArgumentException;
use ReflectionProperty;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Dump
{
    private string $formatterClass;

    public function __construct(?string $formatterClass = null)
    {
        if (is_null($formatterClass)) {
            $formatterClass = Formatter::class;
        }

        if (!is_a($formatterClass, Formatter::class, true)) {
            throw new InvalidArgumentException('The given class must be of Type ' . Formatter::class);
        }

        $this->formatterClass = $formatterClass;
    }

    public function createFormatter(ReflectionProperty $property, object $context) : Formatter
    {
        return new $this->formatterClass($property, $context);
    }
}