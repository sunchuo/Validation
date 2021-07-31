--CREDITS--
Ismael Elias <ismael.esq@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NumberException;
use Respect\Validation\Validator as v;

try {
    $input_0 = acos(1.01);
    v::number()->check($input_0);
} catch (NumberException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 42;
    v::not(v::number())->check($input_0);
} catch (NumberException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = NAN;
    v::number()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 42;
    v::not(v::number())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
`NaN` must be a number
42 must not be a number
- `NaN` must be a number
- 42 must not be a number
