<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Tests\Class;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Filter\NoPassword;
use Berbeflo\ModifyDump\Filter\NoPublic;
use Berbeflo\ModifyDump\Trait\ModifiedDump;

#[AddFilter(NoPassword::class)]
#[AddFilter(NoPublic::class)]
class NoPasswordAndNoPublicClass
{
    use ModifiedDump;

    private $pw = 'secret';
    private $__password = 'secret';
    private $pass = 'secret';
    private $username = 'not-secret';
    public $db = 'secret';
}
