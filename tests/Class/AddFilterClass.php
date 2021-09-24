<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\All;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[AddFilter(All::class)]
class AddFilterClass
{
    use ModifiedDump;

    private int $test = 4;
    protected string $testString = 'output';
}
