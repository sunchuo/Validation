--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CreditCardException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 3566002020360505;
    v::creditCard(null, 'Discover')->check($input_0);
} catch (CreditCardException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 4024007153361885;
    v::not(v::creditCard(null, 'Visa'))->check($input_0);
} catch (CreditCardException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 3566002020360505;
    v::creditCard(null, 'MasterCard')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 5555444433331111;
    v::not(v::creditCard())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
3566002020360505 must be a valid "Discover" Credit Card number
4024007153361885 must not be a valid "Visa" Credit Card number
- 3566002020360505 must be a valid "MasterCard" Credit Card number
- 5555444433331111 must not be a valid Credit Card number
