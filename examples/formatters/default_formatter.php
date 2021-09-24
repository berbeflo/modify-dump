<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Attribute\Option;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

#[Option('default-formatter', AccessModifierFormatter::class)]
class Test
{
    use ModifiedDump;

    #[Dump]
    private $a = 1;
}

var_dump(new Test());
