<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Attribute\Option;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[Option('default-formatter', AccessModifierFormatter::class)]
class ChangeDefaultFormatterClass
{
    use ModifiedDump;

    private int $test = 4;
    #[Dump]
    protected string $testString = 'output';
}
