--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\FalseValException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = true;
    v::falseVal()->check($input_0);
} catch (FalseValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'false';
    v::not(v::falseVal())->check($input_0);
} catch (FalseValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 1;
    v::falseVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 0;
    v::not(v::falseVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
`TRUE` is not considered as "False"
"false" is considered as "False"
- 1 is not considered as "False"
- 0 is considered as "False"
