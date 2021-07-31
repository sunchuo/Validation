--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EqualsException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 321;
    v::equals(123)->check($input_0);
} catch (EqualsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::not(v::equals(321))->check($input_0);
} catch (EqualsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::equals(123)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::not(v::equals(321))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
321 must equal 123
321 must not equal 321
- 321 must equal 123
- 321 must not equal 321
