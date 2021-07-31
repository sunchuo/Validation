--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
Edson Lima <dddwebdeveloper@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
Ian Nisbet <ian@glutenite.co.uk>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = ['bar' => 42];
    v::keyValue('foo', 'equals', 'bar')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 42];
    v::keyValue('foo', 'equals', 'bar')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 42, 'bar' => 43];
    v::keyValue('foo', 'json', 'bar')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 1, 'bar' => 2];
    v::keyValue('foo', 'equals', 'bar')->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 1, 'bar' => 1];
    v::not(v::keyValue('foo', 'equals', 'bar'))->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar' => 42];
    v::keyValue('foo', 'equals', 'bar')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 42];
    v::keyValue('foo', 'equals', 'bar')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 42, 'bar' => 43];
    v::keyValue('foo', 'json', 'bar')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 1, 'bar' => 2];
    v::keyValue('foo', 'equals', 'bar')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['foo' => 1, 'bar' => 1];
    v::not(v::keyValue('foo', 'equals', 'bar'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
Key "foo" must be present
Key "bar" must be present
"bar" must be valid to validate "foo"
foo must equal "bar"
foo must not equal "bar"
- Key "foo" must be present
- Key "bar" must be present
- "bar" must be valid to validate "foo"
- foo must equal "bar"
- foo must not equal "bar"
