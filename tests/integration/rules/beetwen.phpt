--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\BetweenException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 0;
    v::between(1, 2)->check($input_0);
} catch (BetweenException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'today';
    v::not(v::between('yesterday', 'tomorrow'))->check($input_0);
} catch (BetweenException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'd';
    v::between('a', 'c')->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 0;
    v::not(v::between(-INF, INF))->assert($input_0);
} catch (NestedValidationException $e) {
    echo $e->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
0 must be between 1 and 2
"today" must not be between "yesterday" and "tomorrow"
- "d" must be between "a" and "c"
- 0 must not be between `-INF` and `INF`
