--CREDITS--
Emmerson Siqueira <emmersonsiqueira@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

date_default_timezone_set('UTC');

use Respect\Validation\Exceptions\MinAgeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '17 years ago';
    v::minAge(18)->check($input_0);
} catch (MinAgeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '-30 years';
    v::not(v::minAge(18))->check($input_0);
} catch (MinAgeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'yesterday';
    v::minAge(18)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '12/10/2010';
    v::minAge(18, 'd/m/Y')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"17 years ago" must be 18 years or more
"-30 years" must not be 18 years or more
- "yesterday" must be 18 years or more
- "12/10/2010" must be 18 years or more
