--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PostalCodeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '1057BV';
    v::postalCode('BR')->check($input_0);
} catch (PostalCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1057BV';
    v::not(v::postalCode('NL'))->check($input_0);
} catch (PostalCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1057BV';
    v::postalCode('BR')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '1057BV';
    v::not(v::postalCode('NL'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"1057BV" must be a valid postal code on "BR"
"1057BV" must not be a valid postal code on "NL"
- "1057BV" must be a valid postal code on "BR"
- "1057BV" must not be a valid postal code on "NL"
