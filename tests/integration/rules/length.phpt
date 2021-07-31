--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
Mazen Touati <mazen_touati@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Respect\Validation\Exceptions\LengthException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'phpsp.org.br';
    v::length(0, 5, false)->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(0, 10)->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(15, null, false)->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(20)->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(5, 10)->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(0, 15))->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(0, 20, false))->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(10, null))->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(5, null, false))->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(5, 20))->check($input_0);
} catch (LengthException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(0, 5, false)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(0, 10)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(15, null, false)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(20)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::length(5, 10)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(0, 15))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(0, 20, false))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(10, null))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(5, null, false))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'phpsp.org.br';
    v::not(v::length(5, 20))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"phpsp.org.br" must have a length lower than 5
"phpsp.org.br" must have a length lower than or equal to 10
"phpsp.org.br" must have a length greater than 15
"phpsp.org.br" must have a length greater than or equal to 20
"phpsp.org.br" must have a length between 5 and 10
"phpsp.org.br" must not have a length lower than or equal to 15
"phpsp.org.br" must not have a length lower than 20
"phpsp.org.br" must not have a length greater than or equal to 10
"phpsp.org.br" must not have a length greater than 5
"phpsp.org.br" must not have a length between 5 and 20
- "phpsp.org.br" must have a length lower than 5
- "phpsp.org.br" must have a length lower than or equal to 10
- "phpsp.org.br" must have a length greater than 15
- "phpsp.org.br" must have a length greater than or equal to 20
- "phpsp.org.br" must have a length between 5 and 10
- "phpsp.org.br" must not have a length lower than or equal to 15
- "phpsp.org.br" must not have a length lower than 20
- "phpsp.org.br" must not have a length greater than or equal to 10
- "phpsp.org.br" must not have a length greater than 5
- "phpsp.org.br" must not have a length between 5 and 20
