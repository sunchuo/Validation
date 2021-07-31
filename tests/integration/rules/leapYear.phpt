--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LeapYearException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '2009';
    v::leapYear()->check($input_0);
} catch (LeapYearException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2008';
    v::not(v::leapYear())->check($input_0);
} catch (LeapYearException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2009-02-29';
    v::leapYear()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '2008';
    v::not(v::leapYear())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"2009" must be a leap year
"2008" must not be a leap year
- "2009-02-29" must be a leap year
- "2008" must not be a leap year
