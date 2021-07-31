--CREDITS--
Emmerson Siqueira <emmersonsiqueira@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\MaxAgeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '50 years ago';
    v::maxAge(12)->check($input_0);
} catch (MaxAgeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '11 years ago';
    v::not(v::maxAge(12))->check($input_0);
} catch (MaxAgeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1988-09-09';
    v::maxAge(12, 'Y-m-d')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '2018-01-01';
    v::not(v::maxAge(12, 'Y-m-d'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"50 years ago" must be 12 years or less
"11 years ago" must not be 12 years or less
- "1988-09-09" must be 12 years or less
- "2018-01-01" must not be 12 years or less
