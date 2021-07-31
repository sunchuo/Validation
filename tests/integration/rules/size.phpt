--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SizeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size('1kb', '2kb')->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size('700kb', null)->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size(null, '1kb')->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size('500kb', '600kb'))->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size('500kb', null))->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size(null, '600kb'))->check($input_0);
} catch (SizeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size('1kb', '2kb')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size('700kb', null)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::size(null, '1kb')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size('500kb', '600kb'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size('500kb', null))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::size(null, '600kb'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"tests/fixtures/valid-image.gif" must be between "1kb" and "2kb"
"tests/fixtures/valid-image.gif" must be greater than "700kb"
"tests/fixtures/valid-image.gif" must be lower than "1kb"
"tests/fixtures/valid-image.gif" must not be between "500kb" and "600kb"
"tests/fixtures/valid-image.gif" must not be greater than "500kb"
"tests/fixtures/valid-image.gif" must not be lower than "600kb"
- "tests/fixtures/valid-image.gif" must be between "1kb" and "2kb"
- "tests/fixtures/valid-image.gif" must be greater than "700kb"
- "tests/fixtures/valid-image.gif" must be lower than "1kb"
- "tests/fixtures/valid-image.gif" must not be between "500kb" and "600kb"
- "tests/fixtures/valid-image.gif" must not be greater than "500kb"
- "tests/fixtures/valid-image.gif" must not be lower than "600kb"
