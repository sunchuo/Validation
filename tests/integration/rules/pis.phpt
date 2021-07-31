--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PisException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'this thing';
    v::pis()->check($input_0);
} catch (PisException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '120.6671.406-4';
    v::not(v::pis())->check($input_0);
} catch (PisException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'your mother';
    v::pis()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '120.9378.174-5';
    v::not(v::pis())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"this thing" must be a valid PIS number
"120.6671.406-4" must not be a valid PIS number
- "your mother" must be a valid PIS number
- "120.9378.174-5" must not be a valid PIS number
