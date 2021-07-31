--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\BoolTypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'teste';
    v::boolType()->check($input_0);
} catch (BoolTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::not(v::boolType())->check($input_0);
} catch (BoolTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::boolType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = false;
    v::not(v::boolType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"teste" must be of type boolean
`TRUE` must not be of type boolean
- `{ }` must be of type boolean
- `FALSE` must not be of type boolean
