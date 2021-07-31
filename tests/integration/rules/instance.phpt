--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\InstanceException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '';
    v::instance(DateTime::class)->check($input_0);
} catch (InstanceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new ArrayObject();
    v::not(v::instance(Traversable::class))->check($input_0);
} catch (InstanceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::instance(ArrayIterator::class)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::not(v::instance(stdClass::class))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"" must be an instance of "DateTime"
`[traversable] (ArrayObject: { })` must not be an instance of "Traversable"
- `[object] (stdClass: { })` must be an instance of "ArrayIterator"
- `[object] (stdClass: { })` must not be an instance of "stdClass"
