--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\UniqueException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [1, 2, 2, 3];
    v::unique()->check($input_0);
} catch (UniqueException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [1, 2, 3, 4];
    v::not(v::unique())->check($input_0);
} catch (UniqueException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'test';
    v::unique()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['a', 'b', 'c'];
    v::not(v::unique())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
`{ 1, 2, 2, 3 }` must not contain duplicates
`{ 1, 2, 3, 4 }` must contain duplicates
- "test" must not contain duplicates
- `{ "a", "b", "c" }` must contain duplicates
