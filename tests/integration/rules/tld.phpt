--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\TldException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '42';
    v::tld()->check($input_0);
} catch (TldException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'com';
    v::not(v::tld())->check($input_0);
} catch (TldException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1984';
    v::tld()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'com';
    v::not(v::tld())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"42" must be a valid top-level domain name
"com" must not be a valid top-level domain name
- "1984" must be a valid top-level domain name
- "com" must not be a valid top-level domain name
