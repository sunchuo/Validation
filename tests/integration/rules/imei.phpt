--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ImeiException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '490154203237512';
    v::imei()->check($input_0);
} catch (ImeiException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '350077523237513';
    v::not(v::imei())->check($input_0);
} catch (ImeiException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::imei()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '356938035643809';
    v::not(v::imei())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"490154203237512" must be a valid IMEI
"350077523237513" must not be a valid IMEI
- `NULL` must be a valid IMEI
- "356938035643809" must not be a valid IMEI
