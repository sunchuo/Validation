--CREDITS--
Bram Van der Sype <bram.vandersype@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NotEmptyException;
use Respect\Validation\Validator as v;

try {
    $input_0 = null;
    v::notEmpty()->check($input_0);
} catch (NotEmptyException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::notEmpty()->setName('Field')->check($input_0);
} catch (NotEmptyException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::not(v::notEmpty())->check($input_0);
} catch (NotEmptyException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notEmpty()->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notEmpty()->setName('Field')->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = [1];
    v::not(v::notEmpty())->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
The value must not be empty
Field must not be empty
1 must be empty
- The value must not be empty
- Field must not be empty
- `{ 1 }` must be empty
