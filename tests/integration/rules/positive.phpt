--CREDITS--
Ismael Elias <ismael.esq@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PositiveException;
use Respect\Validation\Validator as v;

try {
    $input_0 = -10;
    v::positive()->check($input_0);
} catch (PositiveException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 16;
    v::not(v::positive())->check($input_0);
} catch (PositiveException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::positive()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '165';
    v::not(v::positive())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
-10 must be positive
16 must not be positive
- "a" must be positive
- "165" must not be positive
