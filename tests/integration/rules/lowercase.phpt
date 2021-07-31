--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LowercaseException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'UPPERCASE';
    v::lowercase()->check($input_0);
} catch (LowercaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'lowercase';
    v::not(v::lowercase())->check($input_0);
} catch (LowercaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'UPPERCASE';
    v::lowercase()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'lowercase';
    v::not(v::lowercase())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"UPPERCASE" must be lowercase
"lowercase" must not be lowercase
- "UPPERCASE" must be lowercase
- "lowercase" must not be lowercase
