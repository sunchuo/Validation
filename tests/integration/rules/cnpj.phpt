--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Respect\Validation\Exceptions\CnpjException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'não cnpj';
    v::cnpj()->check($input_0);
} catch (CnpjException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '65.150.175/0001-20';
    v::not(v::cnpj())->check($input_0);
} catch (CnpjException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'test';
    v::cnpj()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '65.150.175/0001-20';
    v::not(v::cnpj())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"não cnpj" must be a valid CNPJ number
"65.150.175/0001-20" must not be a valid CNPJ number
- "test" must be a valid CNPJ number
- "65.150.175/0001-20" must not be a valid CNPJ number
