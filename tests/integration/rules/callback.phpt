--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CallbackException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::callback('is_string')->check($input_0);
} catch (CallbackException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo';
    v::not(v::callback('is_string'))->check($input_0);
} catch (CallbackException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = true;
    v::callback('is_string')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo';
    v::not(v::callback('is_string'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`{ }` must be valid
"foo" must not be valid
- `TRUE` must be valid
- "foo" must not be valid
