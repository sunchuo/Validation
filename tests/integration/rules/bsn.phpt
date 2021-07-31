--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\BsnException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'acb';
    v::bsn()->check($input_0);
} catch (BsnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '612890053';
    v::not(v::bsn())->check($input_0);
} catch (BsnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc';
    v::bsn()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '612890053';
    v::not(v::bsn())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"acb" must be a BSN
"612890053" must not be a BSN
- "abc" must be a BSN
- "612890053" must not be a BSN
