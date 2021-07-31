--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
Edson Lima <dddwebdeveloper@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ConsonantException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'aeiou';
    v::consonant()->check($input_0);
} catch (ConsonantException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'daeiou';
    v::consonant(null, 'd')->check($input_0);
} catch (ConsonantException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bcd';
    v::not(v::consonant())->check($input_0);
} catch (ConsonantException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::consonant(null, 'a'))->check($input_0);
} catch (ConsonantException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'aeiou';
    v::consonant()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'daeiou';
    v::consonant(null, 'd')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'bcd';
    v::not(v::consonant())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::consonant(null, 'a'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"aeiou" must contain only consonants
"daeiou" must contain only consonants and "d"
"bcd" must not contain consonants
"abcd" must not contain consonants or "a"
- "aeiou" must contain only consonants
- "daeiou" must contain only consonants and "d"
- "bcd" must not contain consonants
- "abcd" must not contain consonants or "a"
