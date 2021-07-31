--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NoWhitespaceException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'w poiur';
    v::noWhitespace()->check($input_0);
} catch (NoWhitespaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'wpoiur';
    v::not(v::noWhitespace())->check($input_0);
} catch (NoWhitespaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'w poiur';
    v::noWhitespace()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'wpoiur';
    v::not(v::noWhitespace())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"w poiur" must not contain whitespace
"wpoiur" must contain whitespace
- "w poiur" must not contain whitespace
- "wpoiur" must contain whitespace
