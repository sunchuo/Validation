--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ScalarValException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::scalarVal()->check($input_0);
} catch (ScalarValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::not(v::scalarVal())->check($input_0);
} catch (ScalarValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::scalarVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 42;
    v::not(v::scalarVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ }` must be a scalar value
`TRUE` must not be a scalar value
- `[object] (stdClass: { })` must be a scalar value
- 42 must not be a scalar value
