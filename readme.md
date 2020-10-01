#### Задача:
Требуется написать класс по работе с комплексными числами, реализовать операции сложения, вычитания, умножения и деления, а также провести тестирование его работы.

#### Usage:
```
$ composer require alxdeex\math
```

```php
use alxdeex\Math\Complex;

$a = new Complex(1, 2);
$b = new Complex(0, 5);
$c = $a->add($b);

echo "$a; $b; $c";
```


#### For developers:
 - install phpunit: 
 ```
 $ docker run --rm --interactive --tty  --volume $PWD:/app  composer install
 ```
 - run tests: 
 ```
 $ docker run --rm --tty --volume $PWD:/math php /math/vendor/bin/phpunit /math/tests
```

