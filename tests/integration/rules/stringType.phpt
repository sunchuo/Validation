--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\StringTypeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 42;
    v::stringType()->check($input_0);
} catch (StringTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo';
    v::not(v::stringType())->check($input_0);
} catch (StringTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::stringType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'bar';
    v::not(v::stringType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
42 must be of type string
"foo" must not be of type string
- `TRUE` must be of type string
- "bar" must not be of type string
