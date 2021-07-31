--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\UrlException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'example.com';
    v::url()->check($input_0);
} catch (UrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'http://example.com';
    v::not(v::url())->check($input_0);
} catch (UrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'example.com';
    v::url()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'http://example.com';
    v::not(v::url())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"example.com" must be a URL
"http://example.com" must not be a URL
- "example.com" must be a URL
- "http://example.com" must not be a URL
