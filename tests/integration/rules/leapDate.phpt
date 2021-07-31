--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LeapDateException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '1989-02-29';
    v::leapDate('Y-m-d')->check($input_0);
} catch (LeapDateException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1988-02-29';
    v::not(v::leapDate('Y-m-d'))->check($input_0);
} catch (LeapDateException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1990-02-29';
    v::leapDate('Y-m-d')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '1992-02-29';
    v::not(v::leapDate('Y-m-d'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"1989-02-29" must be leap date
"1988-02-29" must not be leap date
- "1990-02-29" must be leap date
- "1992-02-29" must not be leap date
