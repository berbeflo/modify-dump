<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Trait;

use Berbeflo\ModifyDump\Control\DumpBuilder;

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
