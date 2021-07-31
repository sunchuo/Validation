--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\OddException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 2;
    v::odd()->check($input_0);
} catch (OddException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 7;
    v::not(v::odd())->check($input_0);
} catch (OddException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 2;
    v::odd()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 9;
    v::not(v::odd())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
2 must be an odd number
7 must not be an odd number
- 2 must be an odd number
- 9 must not be an odd number
