--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\IntValException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\WhenException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'abc';
    v::when(v::alwaysValid(), v::intVal())->check($input_0);
} catch (IntValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'def';
    v::when(v::alwaysInvalid(), v::alwaysValid(), v::intVal())->check($input_0);
} catch (IntValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ghi';
    v::not(v::when(v::alwaysValid(), v::stringVal()))->check($input_0);
} catch (WhenException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'jkl';
    v::not(v::when(v::alwaysInvalid(), v::alwaysValid(), v::stringVal()))->check($input_0);
} catch (WhenException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'mno';
    v::when(v::alwaysValid(), v::intVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'pqr';
    v::when(v::alwaysInvalid(), v::alwaysValid(), v::intVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'stu';
    v::not(v::when(v::alwaysValid(), v::stringVal()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'vwx';
    v::not(v::when(v::alwaysInvalid(), v::alwaysValid(), v::stringVal()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"abc" must be an integer number
"def" must be an integer number
"ghi" must not be valid
"jkl" must not be valid
- "mno" must be an integer number
- "pqr" must be an integer number
- "stu" must not be valid
- "vwx" must not be valid
