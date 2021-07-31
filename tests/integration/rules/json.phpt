--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\JsonException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = false;
    v::json()->check($input_0);
} catch (JsonException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '{"foo": "bar", "number":1}';
    v::not(v::json())->check($input_0);
} catch (JsonException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::json()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '{}';
    v::not(v::json())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`FALSE` must be a valid JSON string
"{\"foo\": \"bar\", \"number\":1}" must not be a valid JSON string
- `[object] (stdClass: { })` must be a valid JSON string
- "{}" must not be a valid JSON string
