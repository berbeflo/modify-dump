<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;
use InvalidArgumentException;
use Berbeflo\ModifyDump\Filter\Filter;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class AddFilter
{
    public function __construct(
        private string $filterClass,
    ) {
    }

    public function createFilter(): Filter
    {
        $interfaces = class_implements($this->filterClass);
        if (!$interfaces || !array_key_exists(Filter::class, $interfaces)) {
            throw new InvalidArgumentException('The given class must implement ' . Filter::class);
        }

        return new $this->filterClass();
    }
}
