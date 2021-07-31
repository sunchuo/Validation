--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
Jens Segers <segers.jens@gmail.com>
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\Base64Exception;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '=c3VyZS4';
    v::base64()->check($input_0);
} catch (Base64Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'c3VyZS4=';
    v::not(v::base64())->check($input_0);
} catch (Base64Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '=c3VyZS4';
    v::base64()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'c3VyZS4=';
    v::not(v::base64())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"=c3VyZS4" must be Base64-encoded
"c3VyZS4=" must not be Base64-encoded
- "=c3VyZS4" must be Base64-encoded
- "c3VyZS4=" must not be Base64-encoded
