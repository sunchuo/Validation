--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ImageException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'tests/fixtures/invalid-image.png';
    v::image()->check($input_0);
} catch (ImageException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::image())->check($input_0);
} catch (ImageException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::image()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::image())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"tests/fixtures/invalid-image.png" must be a valid image
"tests/fixtures/valid-image.png" must not be a valid image
- `[object] (stdClass: { })` must be a valid image
- "tests/fixtures/valid-image.gif" must not be a valid image
