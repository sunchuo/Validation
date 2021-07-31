--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\MinException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 10;
    v::min(INF)->check($input_0);
} catch (MinException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = INF;
    v::not(v::min(5))->check($input_0);
} catch (MinException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'yesterday';
    v::min('today')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'z';
    v::not(v::min('a'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
10 must be greater than or equal to `INF`
`INF` must not be greater than or equal to 5
- "yesterday" must be greater than or equal to "today"
- "z" must not be greater than or equal to "a"
