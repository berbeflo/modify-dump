- [1. Usage](#1-usage)
  - [1.1. What are statistics?](#11-what-are-statistics)
  - [1.2. Use statistics](#12-use-statistics)
- [2. Custom statistics](#2-custom-statistics)
  - [2.1. Create the statistic](#21-create-the-statistic)
  - [2.2. Use the statistic](#22-use-the-statistic)
- [3. Implemented statistics](#3-implemented-statistics)
  - [PropertyCount](#propertycount)
- [4. Navigation](#4-navigation)


# 1. Usage
## 1.1. What are statistics?
Statistics are additional information about a class/object, that will be displayed in the `var_dump` output in the key `__statistics`.
## 1.2. Use statistics
```php
#[AddStatistic(PropertyCount::class)]
class Test
{
    use ModifiedDump;

    private $a;
}
```
To use multiple statistics, just use multiple `AddStatistic` attributes.
# 2. Custom statistics
## 2.1. Create the statistic
Statistics have to implement the interface `\Berbeflo\ModifyDump\Statistic\Statistic`, which defines the methods `createStatistic`, which returns the statistic data and `getStatisticIdentifier`, which returns the array key to be used for the statistic.
## 2.2. Use the statistic
Pass the full qualified class name of the statistic class to the `#[AddStatistic]` attribute.
# 3. Implemented statistics
## PropertyCount
Shows the number of properties, defined in the class
# 4. Navigation
- [The readme file](../readme.md)
- [Filters](filters.md)
- [Formatters](formatters.md)
