<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Trait;

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Control\DumpBuilder;
use ReflectionClass;
use ReflectionProperty;

trait ModifiedDump
{
    public function __debugInfo() : array
    {
        $builder = new DumpBuilder($this);
        $builder
            ->parseDumpOptions()
            ->parseFilters();

        return $builder->fetch();
    }
}
