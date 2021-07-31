--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SpaceException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'ab';
    v::space()->check($input_0);
} catch (SpaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'cd';
    v::space(null, 'c')->check($input_0);
} catch (SpaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "\t";
    v::not(v::space())->check($input_0);
} catch (SpaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "\r";
    v::not(v::space(null, 'def'))->check($input_0);
} catch (SpaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ef';
    v::space()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'gh';
    v::space(null, 'e')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = "\n";
    v::not(v::space())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ' k';
    v::not(v::space(null, 'yk'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"ab" must contain only space characters
"cd" must contain only space characters and "c"
"\t" must not contain space characters
"\r" must not contain space characters or "def"
- "ef" must contain only space characters
- "gh" must contain only space characters and "e"
- "\n" must not contain space characters
- " k" must not contain space characters or "yk"
