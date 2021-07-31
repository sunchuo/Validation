--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\TrueValException;
use Respect\Validation\Validator as v;

try {
    $input_0 = false;
    v::trueVal()->check($input_0);
} catch (TrueValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::not(v::trueVal())->check($input_0);
} catch (TrueValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 0;
    v::trueVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'true';
    v::not(v::trueVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
`FALSE` is not considered as "True"
1 is considered as "True"
- 0 is not considered as "True"
- "true" is considered as "True"
