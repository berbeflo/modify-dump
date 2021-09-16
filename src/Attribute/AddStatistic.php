<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;
use InvalidArgumentException;
use Berbeflo\ModifyDump\Statistic\Statistic;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class AddStatistic
{
    public function __construct(
        private string $statisticClass,
    ) {
    }

    public function createStatisicObject(): Statistic
    {
        $interfaces = class_implements($this->statisticClass);
        if (!$interfaces || !array_key_exists(Statistic::class, $interfaces)) {
            throw new InvalidArgumentException('The given class must implement ' . Statistic::class);
        }

        return new $this->statisticClass();
    }
}
