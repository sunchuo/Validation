--CREDITS--
Ismael Elias <ismael.esq@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PrimeNumberException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 10;
    v::primeNumber()->check($input_0);
} catch (PrimeNumberException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 3;
    v::not(v::primeNumber())->check($input_0);
} catch (PrimeNumberException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'Foo';
    v::primeNumber()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '+7';
    v::not(v::primeNumber())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
10 must be a valid prime number
3 must not be a valid prime number
- "Foo" must be a valid prime number
- "+7" must not be a valid prime number
