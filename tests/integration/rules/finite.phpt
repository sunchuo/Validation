--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FiniteException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '';
    v::finite()->check($input_0);
} catch (FiniteException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 10;
    v::not(v::finite())->check($input_0);
} catch (FiniteException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [12];
    v::finite()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '123456';
    v::not(v::finite())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"" must be a finite number
10 must not be a finite number
- `{ 12 }` must be a finite number
- "123456" must not be a finite number
