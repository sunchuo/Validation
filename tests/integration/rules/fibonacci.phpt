--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FibonacciException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 4;
    v::fibonacci()->check($input_0);
} catch (FibonacciException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 5;
    v::not(v::fibonacci())->check($input_0);
} catch (FibonacciException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 16;
    v::fibonacci()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 21;
    v::not(v::fibonacci())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
4 must be a valid Fibonacci number
5 must not be a valid Fibonacci number
- 16 must be a valid Fibonacci number
- 21 must not be a valid Fibonacci number
