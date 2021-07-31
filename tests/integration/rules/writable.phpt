--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\WritableException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '/path/of/a/valid/writable/file.txt';
    v::writable()->check($input_0);
} catch (WritableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::writable())->check($input_0);
} catch (WritableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::writable()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/invalid-image.png';
    v::not(v::writable())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"/path/of/a/valid/writable/file.txt" must be writable
"tests/fixtures/valid-image.png" must not be writable
- `{ }` must be writable
- "tests/fixtures/invalid-image.png" must not be writable
