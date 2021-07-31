--CREDITS--
Gus Antoniassi <gus.antoniassi@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SymbolicLinkException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'tests/fixtures/fake-filename';
    v::symbolicLink()->check($input_0);
} catch (SymbolicLinkException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/symbolic-link';
    v::not(v::symbolicLink())->check($input_0);
} catch (SymbolicLinkException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/fake-filename';
    v::symbolicLink()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'tests/fixtures/symbolic-link';
    v::not(v::symbolicLink())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"tests/fixtures/fake-filename" must be a symbolic link
"tests/fixtures/symbolic-link" must not be a symbolic link
- "tests/fixtures/fake-filename" must be a symbolic link
- "tests/fixtures/symbolic-link" must not be a symbolic link
