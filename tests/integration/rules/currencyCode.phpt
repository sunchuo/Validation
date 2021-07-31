--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CurrencyCodeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'batman';
    v::currencyCode()->check($input_0);
} catch (CurrencyCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'BRL';
    v::not(v::currencyCode())->check($input_0);
} catch (CurrencyCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ppz';
    v::currencyCode()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'GBP';
    v::not(v::currencyCode())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"batman" must be a valid currency
"BRL" must not be a valid currency
- "ppz" must be a valid currency
- "GBP" must not be a valid currency
