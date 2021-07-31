--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CpfException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'this thing';
    v::cpf()->check($input_0);
} catch (CpfException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '276.865.775-11';
    v::not(v::cpf())->check($input_0);
} catch (CpfException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'your mother';
    v::cpf()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '61836182848';
    v::not(v::cpf())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"this thing" must be a valid CPF number
"276.865.775-11" must not be a valid CPF number
- "your mother" must be a valid CPF number
- "61836182848" must not be a valid CPF number
