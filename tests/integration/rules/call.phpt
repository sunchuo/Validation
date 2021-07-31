--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CallException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = ' two words ';
    v::call('trim', v::noWhitespace())->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ' something ';
    v::not(v::call('trim', v::stringType()))->check($input_0);
} catch (CallException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::call('trim', v::alwaysValid())->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1234;
    v::call('strval', v::intType())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1.2;
    v::not(v::call('is_float', v::boolType()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = INF;
    v::call('array_walk', v::alwaysValid())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"two words" must not contain whitespace
" something " must not be valid when executed with "trim"
`{ }` must be valid when executed with "trim"
- "1234" must be of type integer
- 1.2 must not be valid when executed with "is_float"
- `INF` must be valid when executed with "array_walk"
