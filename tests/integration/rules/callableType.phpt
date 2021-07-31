--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CallableTypeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::callableType()->check($input_0);
} catch (CallableTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'trim';
    v::not(v::callableType())->check($input_0);
} catch (CallableTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::callableType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = static function (): void {
    };
    v::not(v::callableType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ }` must be callable
"trim" must not be callable
- `TRUE` must be callable
- `[object] (Closure: { })` must not be callable
