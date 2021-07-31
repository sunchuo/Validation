--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\LanguageCodeException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = null;
    v::languageCode()->check($input_0);
} catch (LanguageCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'pt';
    v::not(v::languageCode())->check($input_0);
} catch (LanguageCodeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'por';
    v::languageCode()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'en';
    v::not(v::languageCode())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
`NULL` must be a valid ISO 639 "alpha-2" language code
"pt" must not be a valid ISO 639 "alpha-2" language code
- "por" must be a valid ISO 639 "alpha-2" language code
- "en" must not be a valid ISO 639 "alpha-2" language code
