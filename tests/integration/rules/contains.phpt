--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ContainsException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'bar';
    v::contains('foo')->check($input_0);
} catch (ContainsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'fool';
    v::not(v::contains('foo'))->check($input_0);
} catch (ContainsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar'];
    v::contains('foo')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar', 'foo'];
    v::not(v::contains('foo', true))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"bar" must contain the value "foo"
"fool" must not contain the value "foo"
- `{ "bar" }` must contain the value "foo"
- `{ "bar", "foo" }` must not contain the value "foo"
