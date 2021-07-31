--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\IterableTypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 3;
    v::iterableType()->check($input_0);
} catch (IterableTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [2, 3];
    v::not(v::iterableType())->check($input_0);
} catch (IterableTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'String';
    v::iterableType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::not(v::iterableType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
3 must be iterable
`{ 2, 3 }` must not be iterable
- "String" must be iterable
- `[object] (stdClass: { })` must not be iterable
