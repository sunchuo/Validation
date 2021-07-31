--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FilterVarException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 42;
    v::filterVar(FILTER_VALIDATE_IP)->check($input_0);
} catch (FilterVarException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'On';
    v::not(v::filterVar(FILTER_VALIDATE_BOOLEAN))->check($input_0);
} catch (FilterVarException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1.5;
    v::filterVar(FILTER_VALIDATE_EMAIL)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 1.0;
    v::not(v::filterVar(FILTER_VALIDATE_FLOAT))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
42 must be valid
"On" must not be valid
- 1.5 must be valid
- 1.0 must not be valid
