--CREDITS--
Singwai Chan <singwai.chan@live.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SubsetException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [1, 2, 3];
    v::subset([1, 2])->check($input_0);
} catch (SubsetException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [1, 2];
    v::not(v::subset([1, 2, 3]))->check($input_0);
} catch (SubsetException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['B', 'C'];
    v::subset(['A', 'B'])->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['A'];
    v::not(v::subset(['A']))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ 1, 2, 3 }` must be subset of `{ 1, 2 }`
`{ 1, 2 }` must not be subset of `{ 1, 2, 3 }`
- `{ "B", "C" }` must be subset of `{ "A", "B" }`
- `{ "A" }` must not be subset of `{ "A" }`
