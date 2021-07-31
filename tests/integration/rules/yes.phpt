--CREDITS--
Cameron Hall <me@chall.id.au>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\YesException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'Yes';
    v::not(v::yes())->check($input_0);
} catch (YesException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'si';
    v::yes()->check($input_0);
} catch (YesException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'Yes';
    v::not(v::yes())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'si';
    v::yes()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"Yes" is considered as "Yes"
"si" is not considered as "Yes"
- "Yes" is considered as "Yes"
- "si" is not considered as "Yes"
