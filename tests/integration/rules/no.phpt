--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NoException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'No';
    v::not(v::no())->check($input_0);
} catch (NoException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'Yes';
    v::no()->check($input_0);
} catch (NoException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'No';
    v::not(v::no())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'Yes';
    v::no()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"No" is considered as "No"
"Yes" is not considered as "No"
- "No" is considered as "No"
- "Yes" is not considered as "No"
