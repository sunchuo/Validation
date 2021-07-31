--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LuhnException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '2222400041240021';
    v::luhn()->check($input_0);
} catch (LuhnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '2223000048400011';
    v::not(v::luhn())->check($input_0);
} catch (LuhnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '340316193809334';
    v::luhn()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '6011000990139424';
    v::not(v::luhn())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"2222400041240021" must be a valid Luhn number
"2223000048400011" must not be a valid Luhn number
- "340316193809334" must be a valid Luhn number
- "6011000990139424" must not be a valid Luhn number
