--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\DateException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

date_default_timezone_set('UTC');

try {
    $input_0 = '2018-01-29T08:32:54+00:00';
    v::date()->check($input_0);
} catch (DateException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2018-01-29';
    v::not(v::date())->check($input_0);
} catch (DateException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2018-01-29T08:32:54+00:00';
    v::date()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '29/01/2018';
    v::not(v::date('d/m/Y'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"2018-01-29T08:32:54+00:00" must be a valid date in the format "2005-12-30"
"2018-01-29" must not be a valid date in the format "2005-12-30"
- "2018-01-29T08:32:54+00:00" must be a valid date in the format "2005-12-30"
- "29/01/2018" must not be a valid date in the format "30/12/2005"
