--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EvenException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = -1;
    v::even()->check($input_0);
} catch (EvenException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 5;
    v::even()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 6;
    v::not(v::even())->check($input_0);
} catch (EvenException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 8;
    v::not(v::even())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
-1 must be an even number
- 5 must be an even number
6 must not be an even number
- 8 must not be an even number
