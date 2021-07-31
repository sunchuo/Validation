--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EmailException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'batman';
    v::email()->check($input_0);
} catch (EmailException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bruce.wayne@gothancity.com';
    v::not(v::email())->check($input_0);
} catch (EmailException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bruce wayne';
    v::email()->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'iambatman@gothancity.com';
    v::not(v::email())->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"batman" must be valid email
"bruce.wayne@gothancity.com" must not be an email
- "bruce wayne" must be valid email
- "iambatman@gothancity.com" must not be an email
