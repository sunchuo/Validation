--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\InfiniteException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = -9;
    v::infinite()->check($input_0);
} catch (InfiniteException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = INF;
    v::not(v::infinite())->check($input_0);
} catch (InfiniteException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::infinite()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = INF * -1;
    v::not(v::infinite())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
-9 must be an infinite number
`INF` must not be an infinite number
- `[object] (stdClass: { })` must be an infinite number
- `-INF` must not be an infinite number
