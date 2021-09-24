<?php

declare(strict_types=1);

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\NoPrivate;
use Berbeflo\ModifyDump\Filter\NoProtected;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

require_once(__DIR__ . '/../../vendor/autoload.php');

#[AddFilter(NoPrivate::class)]
#[AddFilter(NoProtected::class)]
class Test
{
    use ModifiedDump;

    private $a = 1;
    protected $b = 2;
    public $c = 3;
}

var_dump(new Test());
