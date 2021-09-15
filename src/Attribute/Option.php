<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Option
{
    public function __construct(
        private string $identifier,
        private string | int | array $value,
    ) {}

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getValue() : string | int | array
    {
        return $this->value;
    }
}
