--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NotOptionalException;
use Respect\Validation\Validator as v;

try {
    $input_0 = null;
    v::notOptional()->check($input_0);
} catch (NotOptionalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 0;
    v::not(v::notOptional())->check($input_0);
} catch (NotOptionalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::notOptional()->setName('Field')->check($input_0);
} catch (NotOptionalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::not(v::notOptional()->setName('Field'))->check($input_0);
} catch (NotOptionalException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notOptional()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::not(v::notOptional())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notOptional()->setName('Field')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::not(v::notOptional()->setName('Field'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
The value must not be optional
The value must be optional
Field must not be optional
Field must be optional
- The value must not be optional
- The value must be optional
- Field must not be optional
- Field must be optional
