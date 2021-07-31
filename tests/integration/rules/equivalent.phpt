--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EquivalentException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = false;
    v::equivalent(true)->check($input_0);
} catch (EquivalentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'someThing';
    v::not(v::equivalent('Something'))->check($input_0);
} catch (EquivalentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'true';
    v::equivalent(123)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::not(v::equivalent(true))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`FALSE` must be equivalent to `TRUE`
"someThing" must not be equivalent to "Something"
- "true" must be equivalent to 123
- 1 must not be equivalent to `TRUE`
