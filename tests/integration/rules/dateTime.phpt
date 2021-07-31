--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\DateTimeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

date_default_timezone_set('UTC');

try {
    $input_0 = 'FooBarBazz';
    v::dateTime()->check($input_0);
} catch (DateTimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '06-12-1995';
    v::dateTime('c')->check($input_0);
} catch (DateTimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'QuxQuuxx';
    v::dateTime()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 2018013030;
    v::dateTime('r')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '4 days ago';
    v::not(v::dateTime())->check($input_0);
} catch (DateTimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1988-09-09';
    v::not(v::dateTime('Y-m-d'))->check($input_0);
} catch (DateTimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '+3 weeks';
    v::not(v::dateTime())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '23/07/99';
    v::not(v::dateTime('d/m/y'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"FooBarBazz" must be a valid date/time
"06-12-1995" must be a valid date/time in the format "2005-12-30T01:02:03+00:00"
- "QuxQuuxx" must be a valid date/time
- 2018013030 must be a valid date/time in the format "Fri, 30 Dec 2005 01:02:03 +0000"
"4 days ago" must not be a valid date/time
"1988-09-09" must not be a valid date/time in the format "2005-12-30"
- "+3 weeks" must not be a valid date/time
- "23/07/99" must not be a valid date/time in the format "30/12/05"
