--CREDITS--
Emmerson Siqueira <emmersonsiqueira@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
William Espindola <oi@williamespindola.com.br>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\BoolValException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'ok';
    v::boolVal()->check($input_0);
} catch (BoolValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'yes';
    v::not(v::boolVal())->check($input_0);
} catch (BoolValException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'yep';
    v::boolVal()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'on';
    v::not(v::boolVal())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"ok" must be a boolean value
"yes" must not be a boolean value
- "yep" must be a boolean value
- "on" must not be a boolean value
