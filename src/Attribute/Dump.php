<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;
use ReflectionProperty;
use InvalidArgumentException;
use Berbeflo\ModifyDump\Control\Options;
use Berbeflo\ModifyDump\Formatter\Formatter;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Dump
{
    public function __construct(
        private ?string $formatterClass = null
    )
    {}

    public function createFormatter(Options $options, ReflectionProperty $property, object $context) : Formatter
    {
        $formatterClass = $this->formatterClass;

        if (is_null($formatterClass)) {
            $formatterClass = $options->getDefaultFormatter();
        }

        if (!is_a($formatterClass, Formatter::class, true)) {
            throw new InvalidArgumentException('The given class must be of Type ' . Formatter::class);
        }

        return new $formatterClass($property, $context);
    }
}
