--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FloatTypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '42.33';
    v::floatType()->check($input_0);
} catch (FloatTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = INF;
    v::not(v::floatType())->check($input_0);
} catch (FloatTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::floatType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 2.0;
    v::not(v::floatType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"42.33" must be of type float
`INF` must not be of type float
- `TRUE` must be of type float
- 2.0 must not be of type float
