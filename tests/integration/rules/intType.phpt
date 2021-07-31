--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\IntTypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = new stdClass();
    v::intType()->check($input_0);
} catch (IntTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 42;
    v::not(v::intType())->check($input_0);
} catch (IntTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = INF;
    v::intType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1234567890;
    v::not(v::intType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`[object] (stdClass: { })` must be of type integer
42 must not be of type integer
- `INF` must be of type integer
- 1234567890 must not be of type integer
