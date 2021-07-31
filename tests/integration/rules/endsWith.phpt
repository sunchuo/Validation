--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EndsWithException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'bar';
    v::endsWith('foo')->check($input_0);
} catch (EndsWithException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar', 'foo'];
    v::not(v::endsWith('foo'))->check($input_0);
} catch (EndsWithException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::endsWith('foo')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar', 'foo'];
    v::not(v::endsWith('foo'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"bar" must end with "foo"
`{ "bar", "foo" }` must not end with "foo"
- "" must end with "foo"
- `{ "bar", "foo" }` must not end with "foo"
