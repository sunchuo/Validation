--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LessThanException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 21;
    v::lessThan(12)->check($input_0);
} catch (LessThanException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'yesterday';
    v::not(v::lessThan('today'))->check($input_0);
} catch (LessThanException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2018-09-09';
    v::lessThan('1988-09-09')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::not(v::lessThan('b'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
21 must be less than 12
"yesterday" must not be less than "today"
- "2018-09-09" must be less than "1988-09-09"
- "a" must not be less than "b"
