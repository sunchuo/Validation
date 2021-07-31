--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FloatValException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'a';
    v::floatVal()->check($input_0);
} catch (FloatValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 165.0;
    v::not(v::floatVal())->check($input_0);
} catch (FloatValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'a';
    v::floatVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '165.7';
    v::not(v::floatVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"a" must be a float number
165.0 must not be a float number
- "a" must be a float number
- "165.7" must not be a float number
