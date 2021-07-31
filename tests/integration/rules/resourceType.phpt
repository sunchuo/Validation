--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ResourceTypeException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'test';
    v::resourceType()->check($input_0);
} catch (ResourceTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $file = tmpfile();
    v::not(v::resourceType())->check($file);
} catch (ResourceTypeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = [];
    v::resourceType()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $file = tmpfile();
    v::not(v::resourceType())->assert($file);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"test" must be a resource
`[resource] (stream)` must not be a resource
- `{ }` must be a resource
- `[resource] (stream)` must not be a resource
