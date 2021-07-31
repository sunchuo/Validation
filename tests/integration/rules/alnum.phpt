--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\AlnumException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'abc%1';
    v::alnum()->check($input_0);
} catch (AlnumException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc%2';
    v::alnum(' ')->check($input_0);
} catch (AlnumException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd3';
    v::not(v::alnum())->check($input_0);
} catch (AlnumException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc%4';
    v::not(v::alnum('% '))->check($input_0);
} catch (AlnumException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc^1';
    v::alnum()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd2';
    v::not(v::alnum())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc^3';
    v::alnum('* &%')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc^4';
    v::not(v::alnum('^'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"abc%1" must contain only letters (a-z) and digits (0-9)
"abc%2" must contain only letters (a-z), digits (0-9) and " "
"abcd3" must not contain letters (a-z) or digits (0-9)
"abc%4" must not contain letters (a-z), digits (0-9) or "% "
- "abc^1" must contain only letters (a-z) and digits (0-9)
- "abcd2" must not contain letters (a-z) or digits (0-9)
- "abc^3" must contain only letters (a-z), digits (0-9) and "* &%"
- "abc^4" must not contain letters (a-z), digits (0-9) or "^"
