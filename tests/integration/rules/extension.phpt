--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ExtensionException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'filename.txt';
    v::extension('png')->check($input_0);
} catch (ExtensionException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'filename.gif';
    v::not(v::extension('gif'))->check($input_0);
} catch (ExtensionException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'filename.wav';
    v::extension('mp3')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/invalid-image.png';
    v::not(v::extension('png'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"filename.txt" must have "png" extension
"filename.gif" must not have "gif" extension
- "filename.wav" must have "mp3" extension
- "tests/fixtures/invalid-image.png" must not have "png" extension
