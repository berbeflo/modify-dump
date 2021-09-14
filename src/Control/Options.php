<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Control;

use Berbeflo\ModifyDump\Attribute\Option;
use Berbeflo\ModifyDump\Formatter\Formatter;
use InvalidArgumentException;

class Options
{
    private string $defaultFormatterClass = Formatter::class;

    public function setDefaultFormatterClass(string $defaultFormatterClass) : void
    {
        if (!is_a($defaultFormatterClass, Formatter::class, true)) {
            throw new InvalidArgumentException('Class ' . $defaultFormatterClass . ' not allowed as Formatter');
        }

        $this->defaultFormatterClass = $defaultFormatterClass;
    }

    public function getDefaultFormatterClass() : string
    {
        return $this->defaultFormatterClass;
    }
}