--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\MaxException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 11;
    v::max(10)->check($input_0);
} catch (MaxException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 5;
    v::not(v::max(10))->check($input_0);
} catch (MaxException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tomorrow';
    v::max('today')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::not(v::max('b'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
11 must be less than or equal to 10
5 must not be less than or equal to 10
- "tomorrow" must be less than or equal to "today"
- "a" must not be less than or equal to "b"
