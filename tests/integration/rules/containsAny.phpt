--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ContainsAnyException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'baz';
    v::containsAny(['foo', 'bar'])->check($input_0);
} catch (ContainsAnyException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'fool';
    v::not(v::containsAny(['foo', 'bar']))->check($input_0);
} catch (ContainsAnyException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['baz'];
    v::containsAny(['foo', 'bar'])->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['bar', 'foo'];
    v::not(v::containsAny(['foo', 'bar'], true))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"baz" must contain at least one of the values `{ "foo", "bar" }`
"fool" must not contain any of the values `{ "foo", "bar" }`
- `{ "baz" }` must contain at least one of the values `{ "foo", "bar" }`
- `{ "bar", "foo" }` must not contain any of the values `{ "foo", "bar" }`
