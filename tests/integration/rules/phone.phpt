--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PhoneException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '123';
    v::phone()->check($input_0);
} catch (PhoneException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '11977777777';
    v::not(v::phone())->check($input_0);
} catch (PhoneException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '(555)5555 555';
    v::phone()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '+5 555 555 5555';
    v::not(v::phone())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"123" must be a valid telephone number
"11977777777" must not be a valid telephone number
- "(555)5555 555" must be a valid telephone number
- "+5 555 555 5555" must not be a valid telephone number
