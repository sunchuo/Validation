--CREDITS--
Ismael Elias <ismael.esq@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NegativeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 16;
    v::negative()->check($input_0);
} catch (NegativeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = -10;
    v::not(v::negative())->check($input_0);
} catch (NegativeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::negative()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '-144';
    v::not(v::negative())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
16 must be negative
-10 must not be negative
- "a" must be negative
- "-144" must not be negative
