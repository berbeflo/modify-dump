<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NoDump
{
}
