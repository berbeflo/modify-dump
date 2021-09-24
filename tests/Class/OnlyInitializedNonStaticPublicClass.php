<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\NoPrivate;
use Berbeflo\ModifyDump\Filter\NoProtected;
use Berbeflo\ModifyDump\Filter\NoStatic;
use Berbeflo\ModifyDump\Filter\NoUninitialized;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[AddFilter(NoPrivate::class)]
#[AddFilter(NoProtected::class)]
#[AddFilter(NoStatic::class)]
#[AddFilter(NoUninitialized::class)]
class OnlyInitializedNonStaticPublicClass
{
    use ModifiedDump;

    private int $testA = 1;
    protected int $testB = 2;
    public static int $testC = 3;
    public int $testD;
    public int $testE = 5;
}
