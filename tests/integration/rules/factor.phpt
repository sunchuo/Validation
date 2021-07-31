--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FactorException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 2;
    v::factor(3)->check($input_0);
} catch (FactorException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 300;
    v::not(v::factor(0))->check($input_0);
} catch (FactorException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 3;
    v::factor(5)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::not(v::factor(6))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
2 must be a factor of 3
300 must not be a factor of 0
- 3 must be a factor of 5
- 1 must not be a factor of 6
