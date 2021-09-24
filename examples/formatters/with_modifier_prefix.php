<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Formatter\AccessModifierFormatter;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

class Test
{
    use ModifiedDump;

    #[Dump(AccessModifierFormatter::class)]
    private $a = 1;
    #[Dump(AccessModifierFormatter::class)]
    protected $b = 2;
    #[Dump(AccessModifierFormatter::class)]
    protected $c = 3;
}

var_dump(new Test());
