--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CountryCodeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '1';
    v::countryCode()->check($input_0);
} catch (CountryCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'BR';
    v::not(v::countryCode())->check($input_0);
} catch (CountryCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1';
    v::countryCode()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'BR';
    v::not(v::countryCode())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"1" must be a valid country
"BR" must not be a valid country
- "1" must be a valid country
- "BR" must not be a valid country
