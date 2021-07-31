--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\MimetypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'image.png';
    v::mimetype('image/png')->check($input_0);
} catch (MimetypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::mimetype('image/png'))->check($input_0);
} catch (MimetypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/invalid-image.png';
    v::mimetype('image/png')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::mimetype('image/png'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"image.png" must have "image/png" MIME type
"tests/fixtures/valid-image.png" must not have "image/png" MIME type
- "tests/fixtures/invalid-image.png" must have "image/png" MIME type
- "tests/fixtures/valid-image.png" must not have "image/png" MIME type
