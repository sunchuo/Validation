--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\StringValException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::stringVal()->check($input_0);
} catch (StringValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::not(v::stringVal())->check($input_0);
} catch (StringValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::stringVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 42;
    v::not(v::stringVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ }` must be a string
`TRUE` must not be string
- `[object] (stdClass: { })` must be a string
- 42 must not be string
