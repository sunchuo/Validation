--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\XdigitException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'aaa%a';
    v::xdigit()->check($input_0);
} catch (XdigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bbb%b';
    v::xdigit(null, ' ')->check($input_0);
} catch (XdigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ccccc';
    v::not(v::xdigit())->check($input_0);
} catch (XdigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ddd%d';
    v::not(v::xdigit(null, '% '))->check($input_0);
} catch (XdigitException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'eee^e';
    v::xdigit()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'fffff';
    v::not(v::xdigit())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '000^0';
    v::xdigit(null, '* &%')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '111^1';
    v::not(v::xdigit(null, '^'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"aaa%a" contain only hexadecimal digits
"bbb%b" contain only hexadecimal digits and " "
"ccccc" must not contain hexadecimal digits
"ddd%d" must not contain hexadecimal digits or "% "
- "eee^e" contain only hexadecimal digits
- "fffff" must not contain hexadecimal digits
- "000^0" contain only hexadecimal digits and "* &%"
- "111^1" must not contain hexadecimal digits or "^"
