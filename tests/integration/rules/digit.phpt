--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\DigitException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'abc';
    v::digit()->check($input_0);
} catch (DigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'a-b';
    v::digit(null, '-')->check($input_0);
} catch (DigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '123';
    v::not(v::digit())->check($input_0);
} catch (DigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1-3';
    v::not(v::digit(null, '-'))->check($input_0);
} catch (DigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc';
    v::digit()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'a-b';
    v::digit(null, '-')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '123';
    v::not(v::digit())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '1-3';
    v::not(v::digit(null, '-'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"abc" must contain only digits (0-9)
"a-b" must contain only digits (0-9) and "-"
"123" must not contain digits (0-9)
"1-3" must not contain digits (0-9) and "-"
- "abc" must contain only digits (0-9)
- "a-b" must contain only digits (0-9) and "-"
- "123" must not contain digits (0-9)
- "1-3" must not contain digits (0-9) and "-"
