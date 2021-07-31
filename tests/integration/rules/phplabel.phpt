--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
Emmerson Siqueira <emmersonsiqueira@gmail.com>
--TEST--
PhpLabel rule exception should not be thrown for valid inputs
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PhpLabelException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'f o o';
    v::phpLabel()->check($input_0);
} catch (PhpLabelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'correctOne';
    v::not(v::phpLabel())->check($input_0);
} catch (PhpLabelException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '0wner';
    v::phpLabel()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'Respect';
    v::not(v::phpLabel())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"f o o" must be a valid PHP label
"correctOne" must not be a valid PHP label
- "0wner" must be a valid PHP label
- "Respect" must not be a valid PHP label
