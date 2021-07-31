--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PeselException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '21120209251';
    v::pesel()->check($input_0);
} catch (PeselException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '21120209256';
    v::not(v::pesel())->check($input_0);
} catch (PeselException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '21120209251';
    v::pesel()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '21120209256';
    v::not(v::pesel())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--;
"21120209251" must be a valid PESEL
"21120209256" must not be a valid PESEL
- "21120209251" must be a valid PESEL
- "21120209256" must not be a valid PESEL
