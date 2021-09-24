<?php
declare(strict_types=1);

namespace Berbeflo\ModifyDump\Control;

use Berbeflo\ModifyDump\Attribute\AddFilter;
use Berbeflo\ModifyDump\Attribute\AddStatistic;
use ReflectionClass;
use ReflectionProperty;
use Berbeflo\ModifyDump\Attribute\Dump;
use Berbeflo\ModifyDump\Attribute\Option;
use Berbeflo\ModifyDump\Filter\OnlyWithDumpAttribute;

class DumpBuilder
{
    private ReflectionClass $reflectionClass;
    private Options $options;
    private array $filters;
    private array $statistics;

    public function __construct(
        private object $context,
    ) {
        $this->reflectionClass = new ReflectionClass($context);
        $this->options = new Options();
        $this->filters = [];
        $this->statistics = [];
    }

    public function parseDumpOptions(): self
    {
        foreach ($this->reflectionClass->getAttributes(Option::class) as $option) {
            $optionObject = $option->newInstance();
            $identifier = $optionObject->getIdentifier();
            $optionValue = $optionObject->getValue();

            $methodName = 'set' . implode('', array_map('ucfirst', explode('-', $identifier)));
            $this->options->{$methodName}($optionValue);
        }

        return $this;
    }

    public function parseFilters(): self
    {
        $this->filters = [];
        foreach ($this->reflectionClass->getAttributes(AddFilter::class) as $filter) {
            $addFilterObject = $filter->newInstance();
            $filter = $addFilterObject->createFilter();
            $this->filters[] = $filter;
        }

        if (empty($this->filters)) {
            $this->filters = [new OnlyWithDumpAttribute()];
        }

        return $this;
    }

    public function parseStatistics(): self
    {
        $this->statistics = [];
        foreach ($this->reflectionClass->getAttributes(AddStatistic::class) as $statistic) {
            $addStatisticObject = $statistic->newInstance();
            $statistic = $addStatisticObject->createStatisicObject();
            $this->statistics[] = $statistic;
        }

        return $this;
    }

    public function fetch(): array
    {
        $out = [];
        $propertiesToShow = $this->reflectionClass->getProperties();
        foreach ($this->filters as $filter) {
            $propertiesToShow = array_filter(
                $propertiesToShow,
                fn (ReflectionProperty $property) => $filter->isAllowed($property, $this->context)
            );
        }

        foreach ($propertiesToShow as $property) {
            $attribute = $property->getAttributes(Dump::class)[0] ?? null;
            $formatter = null;
            if ($attribute !== null) {
                $attributeObject = $attribute->newInstance();
                $formatter = $attributeObject->createFormatter($this->options, $property, $this->context);
            }

            if ($formatter === null) {
                $formatterClass = $this->options->getDefaultFormatter();
                $formatter = new $formatterClass($property, $this->context);
            }

            $out[$formatter->getIdentifier()] = $formatter->getValue();
        }

        $statistics = [];
        foreach ($this->statistics as $statistic) {
            $statistics[$statistic->getStatisticIdentifier()] = $statistic->createStatistic(
                $this->reflectionClass,
                $this->context
            );
        }
        if (!empty($statistics)) {
            $out['__statistics'] = $statistics;
        }

        return $out;
    }
}
