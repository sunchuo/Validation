--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
Julián Gutiérrez <juliangut@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NifException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '06357771Q';
    v::nif()->check($input_0);
} catch (NifException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '71110316C';
    v::not(v::nif())->check($input_0);
} catch (NifException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '06357771Q';
    v::nif()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'R1332622H';
    v::not(v::nif())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"06357771Q" must be a NIF
"71110316C" must not be a NIF
- "06357771Q" must be a NIF
- "R1332622H" must not be a NIF
