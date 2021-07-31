--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CnhException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'batman';
    v::cnh()->check($input_0);
} catch (CnhException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = '02650306461';
    v::not(v::cnh())->check($input_0);
} catch (CnhException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'bruce wayne';
    v::cnh()->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '02650306461';
    v::not(v::cnh())->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"batman" must be a valid CNH number
"02650306461" must not be a valid CNH number
- "bruce wayne" must be a valid CNH number
- "02650306461" must not be a valid CNH number
