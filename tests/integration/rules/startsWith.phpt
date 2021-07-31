--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\StartsWithException;
use Respect\Validation\Validator as v;

try {
    $input_0 = ['a', 'b'];
    v::startsWith('b')->check($input_0);
} catch (StartsWithException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [1.1, 2.2];
    v::not(v::startsWith(1.1))->check($input_0);
} catch (StartsWithException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [3.3, 4.4];
    v::startsWith('3.3', true)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['c', 'd'];
    v::not(v::startsWith('c'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ "a", "b" }` must start with "b"
`{ 1.1, 2.2 }` must not start with 1.1
- `{ 3.3, 4.4 }` must start with "3.3"
- `{ "c", "d" }` must not start with "c"
