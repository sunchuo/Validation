--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PunctException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'a';
    v::punct()->check($input_0);
} catch (PunctException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'b';
    v::punct(null, 'c')->check($input_0);
} catch (PunctException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '.';
    v::not(v::punct())->check($input_0);
} catch (PunctException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '?';
    v::not(v::punct(null, 'd'))->check($input_0);
} catch (PunctException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'e';
    v::punct()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'g';
    v::punct(null, 'f')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '!';
    v::not(v::punct())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ';';
    v::not(v::punct(null, 'h'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"a" must contain only punctuation characters
"b" must contain only punctuation characters and "c"
"." must not contain punctuation characters
"?" must not contain punctuation characters or "d"
- "e" must contain only punctuation characters
- "g" must contain only punctuation characters and "f"
- "!" must not contain punctuation characters
- ";" must not contain punctuation characters or "h"
