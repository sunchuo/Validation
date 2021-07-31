--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CountableException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 1.0;
    v::countable()->check($input_0);
} catch (CountableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::not(v::countable())->check($input_0);
} catch (CountableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'Not countable!';
    v::countable()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = new ArrayObject();
    v::not(v::countable())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
1.0 must be countable
`{ }` must not be countable
- "Not countable!" must be countable
- `[traversable] (ArrayObject: { })` must not be countable
