--CREDITS--
Emmerson Siqueira <emmersonsiqueira@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ArrayValException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'Bla %123';
    v::arrayVal()->check($input_0);
} catch (ArrayValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [42];
    v::not(v::arrayVal())->check($input_0);
} catch (ArrayValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::arrayVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = new ArrayObject([2, 3]);
    v::not(v::arrayVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"Bla %123" must be an array value
`{ 42 }` must not be an array value
- `[object] (stdClass: { })` must be an array value
- `[traversable] (ArrayObject: { 2, 3 })` must not be an array value
