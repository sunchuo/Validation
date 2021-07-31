--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\BaseException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'Z01xSsg5675hic20dj';
    v::base(61)->check($input_0);
} catch (BaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '';
    v::base(2)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '011010001';
    v::not(v::base(2))->check($input_0);
} catch (BaseException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '011010001';
    v::not(v::base(2))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"Z01xSsg5675hic20dj" must be a number in the base 61
- "" must be a number in the base 2
"011010001" must not be a number in the base 2
- "011010001" must not be a number in the base 2
