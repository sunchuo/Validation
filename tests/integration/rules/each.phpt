--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\EachException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = null;
    v::each(v::dateTime())->check($input_0);
} catch (EachException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = ['2018-10-10'];
    v::not(v::each(v::dateTime()))->check($input_0);
} catch (EachException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::each(v::dateTime())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['2018-10-10'];
    v::not(v::each(v::dateTime()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
Each item in `NULL` must be valid
Each item in `{ "2018-10-10" }` must not validate
- Each item in `NULL` must be valid
- Each item in `{ "2018-10-10" }` must not validate
