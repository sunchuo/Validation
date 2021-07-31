--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PolishIdCardException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'AYE205411';
    v::polishIdCard()->check($input_0);
} catch (PolishIdCardException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'AYE205410';
    v::not(v::polishIdCard())->check($input_0);
} catch (PolishIdCardException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'AYE205411';
    v::polishIdCard()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'AYE205410';
    v::not(v::polishIdCard())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"AYE205411" must be a valid Polish Identity Card number
"AYE205410" must not be a valid Polish Identity Card number
- "AYE205411" must be a valid Polish Identity Card number
- "AYE205410" must not be a valid Polish Identity Card number
