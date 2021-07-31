--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NotBlankException;
use Respect\Validation\Validator as v;

try {
    $input_0 = null;
    v::notBlank()->check($input_0);
} catch (NotBlankException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::notBlank()->setName('Field')->check($input_0);
} catch (NotBlankException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::not(v::notBlank())->check($input_0);
} catch (NotBlankException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notBlank()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::notBlank()->setName('Field')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = [1];
    v::not(v::notBlank())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
The value must not be blank
Field must not be blank
1 must be blank
- The value must not be blank
- Field must not be blank
- `{ 1 }` must be blank
