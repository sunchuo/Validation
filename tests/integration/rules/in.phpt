--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\InException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 1;
    v::in([3, 2])->check($input_0);
} catch (InException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo';
    v::not(v::in('foobar'))->check($input_0);
} catch (InException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2';
    v::in([2, '1', 3], true)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '1';
    v::not(v::in([2, '1', 3], true))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
1 must be in `{ 3, 2 }`
"foo" must not be in "foobar"
- "2" must be in `{ 2, "1", 3 }`
- "1" must not be in `{ 2, "1", 3 }`
