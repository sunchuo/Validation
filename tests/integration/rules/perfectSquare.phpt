--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PerfectSquareException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 250;
    v::perfectSquare()->check($input_0);
} catch (PerfectSquareException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 9;
    v::not(v::perfectSquare())->check($input_0);
} catch (PerfectSquareException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 7;
    v::perfectSquare()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 400;
    v::not(v::perfectSquare())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
250 must be a valid perfect square
9 must not be a valid perfect square
- 7 must be a valid perfect square
- 400 must not be a valid perfect square
