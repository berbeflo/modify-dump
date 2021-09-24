<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Attribute\NoDump;
use Berbeflo\ModifyDump\Filter\OnlyWithoutNoDumpAttribute;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[AddFilter(OnlyWithoutNoDumpAttribute::class)]
class AllButWithNoDump
{
    use ModifiedDump;

    #[NoDump]
    private $testA = 1;
    private $testB = 2;
}
