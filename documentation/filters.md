- [1. Usage](#1-usage)
  - [1.1. What are filters?](#11-what-are-filters)
  - [1.2. Use filters](#12-use-filters)
  - [1.3. Default filter](#13-default-filter)
- [2. Custom filters](#2-custom-filters)
  - [2.1. Create the filter](#21-create-the-filter)
  - [2.2. Use the filter](#22-use-the-filter)
- [3. Implemented filters](#3-implemented-filters)
  - [3.1. All](#31-all)
  - [3.2. NoPassword](#32-nopassword)
  - [3.3. NoPrivate](#33-noprivate)
  - [3.4. NoProtected](#34-noprotected)
  - [3.5. NoPublic](#35-nopublic)
  - [3.6. NoUninitialized](#36-nouninitialized)
  - [3.7. OnlyWithDumpAttribute](#37-onlywithdumpattribute)
  - [3.8. OnlyWithoutNoDumpAttribute](#38-onlywithoutnodumpattribute)
- [4. Navigation](#4-navigation)

# 1. Usage
## 1.1. What are filters?
Filters define which properties will be output by `var_dump`. You can use multiple filters for one class. Filters are defined at class level.
## 1.2. Use filters
```php
#[AddFilter(All:class)]
class Test
{
    use ModifiedDump;

    private $a;
    private $b;
}
```
To use multiple filters just use multiple `AddFilter` attributes.
## 1.3. Default filter
The default filter is `OnlyWithDumpAttribute`, which requires properties to be attributes with `#[Dump]`

# 2. Custom filters
## 2.1. Create the filter
Filters have to implement the interface `\Berbeflo\ModifyDump\Filter\Filter`, which defines the method `isAllowed` with the signature `isAllowed(ReflectionProperty $property, object $context): bool`. If the property should be displayed, the method has to return `true`.  
It also defines the method `create` which must return the filter instance.
## 2.2. Use the filter
Use the full qualified class name as argument for the `AddFilter` attribute.

# 3. Implemented filters
## 3.1. All
A dummy filter if you don't want to exclude any properties. Always returns true.
## 3.2. NoPassword
A filter that exludes properties with the names `password`, `pw` and `pass`. Underscores will be ignored.
## 3.3. NoPrivate
A filter that excludes all private properties.
## 3.4. NoProtected
A filter that excludes all protected properties.
## 3.5. NoPublic
A filter that excludes all public properties.
## 3.6. NoUninitialized
A filter that excludes all properties that aren't initialized.
## 3.7. OnlyWithDumpAttribute
A filter that excludes all properties that are **not** attributed with `#[Dump]`.
## 3.8. OnlyWithoutNoDumpAttribute
A filter that excludes all properties that are attributed with `#[NoDump]`.

# 4. Navigation
- [The readme file](../readme.md)
- [Formatters](formatters.md)
- [Statistics](statistics.md)
