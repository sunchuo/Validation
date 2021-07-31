--CREDITS--
Emmerson Siqueira <emmersonsiqueira@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\PrintableException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '';
    v::printable()->check($input_0);
} catch (PrintableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'abc';
    v::not(v::printable())->check($input_0);
} catch (PrintableException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foo' . chr(10) . 'bar';
    v::printable()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '$%asd';
    v::not(v::printable())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"" must contain only printable characters
"abc" must not contain printable characters
- "foo\nbar" must contain only printable characters
- "$%asd" must not contain printable characters
