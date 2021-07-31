--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ReadableException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'tests/fixtures/invalid-image.jpg';
    v::readable()->check($input_0);
} catch (ReadableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::readable())->check($input_0);
} catch (ReadableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::readable()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::readable())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"tests/fixtures/invalid-image.jpg" must be readable
"tests/fixtures/valid-image.png" must not be readable
- `[object] (stdClass: { })` must be readable
- "tests/fixtures/valid-image.png" must not be readable
