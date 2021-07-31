--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ObjectTypeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::objectType()->check($input_0);
} catch (ObjectTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::not(v::objectType())->check($input_0);
} catch (ObjectTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'test';
    v::objectType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = new ArrayObject();
    v::not(v::objectType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ }` must be of type object
`[object] (stdClass: { })` must not be of type object
- "test" must be of type object
- `[traversable] (ArrayObject: { })` must not be of type object
