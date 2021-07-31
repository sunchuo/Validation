--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Respect\Validation\Exceptions\ControlException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '16-50';
    v::control()->check($input_0);
} catch (ControlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '16-50';
    v::control(null, '16')->check($input_0);
} catch (ControlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "\n";
    v::not(v::control())->check($input_0);
} catch (ControlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "16\n";
    v::not(v::control(null, '16'))->check($input_0);
} catch (ControlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'Foo';
    v::control()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'Foo';
    v::control(null, 'Bar')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = "\n";
    v::not(v::control())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = "Bar\n";
    v::not(v::control(null, 'Bar'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"16-50" must contain only control characters
"16-50" must contain only control characters and "16"
"\n" must not contain control characters
"16\n" must not contain control characters or "16"
- "Foo" must contain only control characters
- "Foo" must contain only control characters and "Bar"
- "\n" must not contain control characters
- "Bar\n" must not contain control characters or "Bar"
