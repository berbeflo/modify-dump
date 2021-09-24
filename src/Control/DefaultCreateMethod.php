<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Control;

trait DefaultCreateMethod
{
    public function create(): static
    {
        return new static();
    }
}
