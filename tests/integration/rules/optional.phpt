--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 1234;
    v::optional(v::alpha())->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1234;
    v::optional(v::alpha())->setName('Name')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::optional(v::alpha()))->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::optional(v::alpha()))->setName('Name')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1234;
    v::optional(v::alpha())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1234;
    v::optional(v::alpha())->setName('Name')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::optional(v::alpha()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'abcd';
    v::not(v::optional(v::alpha()))->setName('Name')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
1234 must contain only letters (a-z)
Name must contain only letters (a-z)
The value must not be optional
Name must not be optional
- 1234 must contain only letters (a-z)
- Name must contain only letters (a-z)
- The value must not be optional
- Name must not be optional
