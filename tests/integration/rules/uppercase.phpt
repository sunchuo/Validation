--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\UppercaseException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'lowercase';
    v::uppercase()->check($input_0);
} catch (UppercaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'lowercase';
    v::uppercase()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'UPPERCASE';
    v::not(v::uppercase())->check($input_0);
} catch (UppercaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'UPPERCASE';
    v::not(v::uppercase())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"lowercase" must be uppercase
- "lowercase" must be uppercase
"UPPERCASE" must not be uppercase
- "UPPERCASE" must not be uppercase
