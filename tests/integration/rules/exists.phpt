--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ExistsException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '/path/of/a/non-existent/file';
    v::exists()->check($input_0);
} catch (ExistsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.gif';
    v::not(v::exists())->check($input_0);
} catch (ExistsException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '/path/of/a/non-existent/file';
    v::exists()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/valid-image.png';
    v::not(v::exists())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"/path/of/a/non-existent/file" must exists
"tests/fixtures/valid-image.gif" must not exists
- "/path/of/a/non-existent/file" must exists
- "tests/fixtures/valid-image.png" must not exists
