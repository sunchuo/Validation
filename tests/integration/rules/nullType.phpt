--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NullTypeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '';
    v::nullType()->check($input_0);
} catch (NullTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::not(v::nullType())->check($input_0);
} catch (NullTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = false;
    v::nullType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::not(v::nullType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"" must be null
`NULL` must not be null
- `FALSE` must be null
- `NULL` must not be null
