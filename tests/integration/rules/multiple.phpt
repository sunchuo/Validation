--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\MultipleException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 22;
    v::multiple(3)->check($input_0);
} catch (MultipleException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 9;
    v::not(v::multiple(3))->check($input_0);
} catch (MultipleException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 5;
    v::multiple(2)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 25;
    v::not(v::multiple(5))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
22 must be multiple of 3
9 must not be multiple of 3
- 5 must be multiple of 2
- 25 must not be multiple of 5
