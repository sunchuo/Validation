--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\IdenticalException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 321;
    v::identical(123)->check($input_0);
} catch (IdenticalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::not(v::identical(321))->check($input_0);
} catch (IdenticalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::identical(123)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 321;
    v::not(v::identical(321))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
321 must be identical as 123
321 must not be identical as 321
- 321 must be identical as 123
- 321 must not be identical as 321
