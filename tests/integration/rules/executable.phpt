--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ExecutableException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'bar';
    v::executable()->check($input_0);
} catch (ExecutableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/executable';
    v::not(v::executable())->check($input_0);
} catch (ExecutableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bar';
    v::executable()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/executable';
    v::not(v::executable())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"bar" must be an executable file
"tests/fixtures/executable" must not be an executable file
- "bar" must be an executable file
- "tests/fixtures/executable" must not be an executable file
