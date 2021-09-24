- [1. Usage](#1-usage)
  - [1.1. What are formatters?](#11-what-are-formatters)
  - [1.2. Use formatters](#12-use-formatters)
  - [1.3. Default formatter](#13-default-formatter)
- [2. Custom Formatters](#2-custom-formatters)
  - [2.1. Create the formatter](#21-create-the-formatter)
  - [2.2. Use the formatter](#22-use-the-formatter)
- [3. Implemented Formatters](#3-implemented-formatters)
  - [3.1. AccessModifierFormatter](#31-accessmodifierformatter)
- [4. Navigation](#4-navigation)

# 1. Usage
## 1.1. What are formatters?
Formatters are used to change the output of properties.
## 1.2. Use formatters
```php
class Test
{
    use ModifiedDump;

    #[Dump(Formatter::class)]
    private $a;
}
```
To use a formatter, just pass it's full qualified class name to the `#[Dump]` attribute.
## 1.3. Default formatter
The default formatter is the `Formatter` class, which returns the property name as identifier and the property value as value. If a property is uninitialized, an instance of `Uninitialized` will be returned.  
To change the default formatter, use the `#[Option]` attribute on class level:
```php
#[Option('default-formatter', AccessModifierFormatter::class)]
class Test
{
    use ModifiedDump;

    private $a;
}
```
# 2. Custom Formatters
## 2.1. Create the formatter
Formatters have to extend the class `\Berbeflo\ModifyDump\Formatter\Formatter.php`. The method `getIdentifier` returns the identifier, which will be displayed on `var_dump`. The method `getValue` returns the value, which will be displayed on `var_dump`.
## 2.2. Use the formatter
Use the full qualified class name as argument for the `Dump` attribute.
# 3. Implemented Formatters
## 3.1. AccessModifierFormatter
This formatter returns the method name with prefixed
- `+` for public properties
- `#` for protected properties
- `-` for private properties
# 4. Navigation
- [The readme file](../readme.md)
- [Filters](filters.md)
- [Statistics](statistics.md)
