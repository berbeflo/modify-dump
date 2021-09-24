<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Control;

trait DefaultCreateMethod
{
    public static function create(): static
    {
        /** @phpstan-ignore-next-line */
        return new static();
    }
}
