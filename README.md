# PHP Variables Data
This is a php package to deal with different data type variables.

### Installation
```
$ composer require amsify42/php-vars-data
```

## Table of Contents
1. [Evaluate](#1-evaluate)
2. [Array Simple](#2-array-simple)


### 1. Evaluate
This is a simple class `Amsify42\PHPVarsData\Data\Evaluate` which converts string to its actual evaluated value and convert actual value to its evaluated string.
```php
use Amsify42\PHPVarsData\Data\Evaluate;
```
To convert string to actual evaluated value
```php
Evaluate::toValue('true');
Evaluate::toValue('false');
Evaluate::toValue('null');
Evaluate::toValue('42');
Evaluate::toValue('4.2');
Evaluate::toValue('Amsify');
```
To convert actual value to its evaluated string
```php
Evaluate::toString(true);
Evaluate::toString(false);
Evaluate::toString(null);
Evaluate::toString(42);
Evaluate::toString(4.2);
```
To convert short count string value to its evaluated count
```php
Evaluate::toCount('2.5K');
Evaluate::toCount('4.2M');
Evaluate::toCount('1.1B');
```
We can do the same with helper methods as well
```php
evaluate_to_value('true');
evaluate_to_string(true);
evaluate_to_count('3.1k');
```
### 2. Array Simple
Its a helper class to set/get any level array element easily.
```php
use Amsify42\PHPVarsData\Data\ArraySimple;
```
This is how we can initialize array
```php
$arraySimple = new ArraySimple([1,2,3]);
```
or
```php
$arraySimple = new get_array_simple([1,2,3]);
```
With the initialized array, we can do all the things which we do with conventional array like setting/unsetting keys, iterating.
```php
foreach($arraySimple as $item)
{
    echo $item;
}

$item[] = 4;
unset($item[4]);
```
Apart from doing the above, we can also set/get element value from any level like this
```php
$arraySimple = get_array_simple([
            'name' => 'amsify',
            'detail' => [
                'location' => 'somewhere',
                'more_detail' => [
                    'do' => 'something',
                    'ids' => [42]
                ]
            ]
        ]);
echo $arraySimple->get('detail.location');
$arraySimple->set('detail.more_detail.do', 'nothing');
echo $arraySimple->get('detail.more_detail.do');
```
If you have noticed, we are passing key levels separated by dot.
<br/>
**Note:** Make sure the element key names in array does not contain dots else results might not be as expected.