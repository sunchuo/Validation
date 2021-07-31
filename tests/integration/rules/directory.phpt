--CREDITS--
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\DirectoryException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'batman';
    v::directory()->check($input_0);
} catch (DirectoryException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = dirname('/etc/');
    v::not(v::directory())->check($input_0);
} catch (DirectoryException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ppz';
    v::directory()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = dirname('/etc/');
    v::not(v::directory())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"batman" must be a directory
"/" must not be a directory
- "ppz" must be a directory
- "/" must not be a directory
