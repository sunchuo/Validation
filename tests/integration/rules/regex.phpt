--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\RegexException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'w poiur';
    v::regex('/^w+$/')->check($input_0);
} catch (RegexException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'wpoiur';
    v::not(v::regex('/^[a-z]+$/'))->check($input_0);
} catch (RegexException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = new stdClass();
    v::regex('/^w+$/')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'wPoiur';
    v::not(v::regex('/^[a-z]+$/i'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"w poiur" must validate against "/^w+$/"
"wpoiur" must not validate against "/^[a-z]+$/"
- `[object] (stdClass: { })` must validate against "/^w+$/"
- "wPoiur" must not validate against "/^[a-z]+$/i"
