--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\CharsetException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'açaí';
    v::charset('ASCII')->check($input_0);
} catch (CharsetException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'açaí';
    v::not(v::charset('UTF-8'))->check($input_0);
} catch (CharsetException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'açaí';
    v::charset('ASCII')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'açaí';
    v::not(v::charset('UTF-8'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"açaí" must be in the `{ "ASCII" }` charset
"açaí" must not be in the `{ "UTF-8" }` charset
- "açaí" must be in the `{ "ASCII" }` charset
- "açaí" must not be in the `{ "UTF-8" }` charset
