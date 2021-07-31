--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\TypeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '42';
    v::type('integer')->check($input_0);
} catch (TypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo';
    v::not(v::type('string'))->check($input_0);
} catch (TypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 20;
    v::type('double')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::not(v::type('bool'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"42" must be "integer"
"foo" must not be "string"
- 20 must be "double"
- `TRUE` must not be "bool"
