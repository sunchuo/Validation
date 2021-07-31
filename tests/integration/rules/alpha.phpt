--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\AlphaException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'aaa%a';
    v::alpha()->check($input_0);
} catch (AlphaException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bbb%b';
    v::alpha(null, ' ')->check($input_0);
} catch (AlphaException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ccccc';
    v::not(v::alpha())->check($input_0);
} catch (AlphaException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ddd%d';
    v::not(v::alpha(null, '% '))->check($input_0);
} catch (AlphaException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'eee^e';
    v::alpha()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'fffff';
    v::not(v::alpha())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'ggg^g';
    v::alpha(null, '* &%')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'hhh^h';
    v::not(v::alpha(null, '^'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"aaa%a" must contain only letters (a-z)
"bbb%b" must contain only letters (a-z) and " "
"ccccc" must not contain letters (a-z)
"ddd%d" must not contain letters (a-z) or "% "
- "eee^e" must contain only letters (a-z)
- "fffff" must not contain letters (a-z)
- "ggg^g" must contain only letters (a-z) and "* &%"
- "hhh^h" must not contain letters (a-z) or "^"
