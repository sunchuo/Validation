--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\TimeException;
use Respect\Validation\Validator as v;

date_default_timezone_set('UTC');

try {
    $input_0 = '2018-01-30';
    v::time()->check($input_0);
} catch (TimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '09:25:46';
    v::not(v::time())->check($input_0);
} catch (TimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2018-01-30';
    v::time()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '8:13 AM';
    v::not(v::time('g:i A'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"2018-01-30" must be a valid time in the format "23:59:59"
"09:25:46" must not be a valid time in the format "23:59:59"
- "2018-01-30" must be a valid time in the format "23:59:59"
- "8:13 AM" must not be a valid time in the format "11:59 PM"
