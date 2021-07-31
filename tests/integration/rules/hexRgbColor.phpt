--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\HexRgbColorException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'invalid';
    v::hexRgbColor()->check($input_0);
} catch (HexRgbColorException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '#808080';
    v::not(v::hexRgbColor())->check($input_0);
} catch (HexRgbColorException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'invalid';
    v::hexRgbColor()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '#808080';
    v::not(v::hexRgbColor())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"invalid" must be a hex RGB color
"#808080" must not be a hex RGB color
- "invalid" must be a hex RGB color
- "#808080" must not be a hex RGB color
