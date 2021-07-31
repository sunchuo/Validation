--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\VowelException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'b';
    v::vowel()->check($input_0);
} catch (VowelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'd';
    v::vowel('c')->check($input_0);
} catch (VowelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::not(v::vowel())->check($input_0);
} catch (VowelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'e';
    v::not(v::vowel('f'))->check($input_0);
} catch (VowelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'g';
    v::vowel()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'j';
    v::vowel('h')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'i';
    v::not(v::vowel())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'o';
    v::not(v::vowel('k'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"b" must contain only vowels
"d" must contain only vowels and "c"
"a" must not contain vowels
"e" must not contain vowels or "f"
- "g" must contain only vowels
- "j" must contain only vowels and "h"
- "i" must not contain vowels
- "o" must not contain vowels or "k"
