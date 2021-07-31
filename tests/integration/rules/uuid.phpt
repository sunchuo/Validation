--CREDITS--
Michael Weimann <mail@michael-weimann.eu>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\UuidException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'g71a18f4-3a13-11e7-a919-92ebcb67fe33';
    v::uuid()->check($input_0);
} catch (UuidException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'e0b5ffb9-9caf-2a34-9673-8fc91db78be6';
    v::uuid(null, 1)->check($input_0);
} catch (UuidException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'fb3a7909-8034-59f5-8f38-21adbc168db7';
    v::not(v::uuid())->check($input_0);
} catch (UuidException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '11a38b9a-b3da-360f-9353-a5a725514269';
    v::not(v::uuid(null, 3))->check($input_0);
} catch (UuidException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'g71a18f4-3a13-11e7-a919-92ebcb67fe33';
    v::uuid()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'a71a18f4-3a13-11e7-a919-92ebcb67fe33';
    v::uuid(null, 4)->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'e0b5ffb9-9caf-4a34-9673-8fc91db78be6';
    v::not(v::uuid())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'c4a760a8-dbcf-5254-a0d9-6a4474bd1b62';
    v::not(v::uuid(null, 5))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"g71a18f4-3a13-11e7-a919-92ebcb67fe33" must be a valid UUID
"e0b5ffb9-9caf-2a34-9673-8fc91db78be6" must be a valid UUID version 1
"fb3a7909-8034-59f5-8f38-21adbc168db7" must not be a valid UUID
"11a38b9a-b3da-360f-9353-a5a725514269" must not be a valid UUID version 3
- "g71a18f4-3a13-11e7-a919-92ebcb67fe33" must be a valid UUID
- "a71a18f4-3a13-11e7-a919-92ebcb67fe33" must be a valid UUID version 4
- "e0b5ffb9-9caf-4a34-9673-8fc91db78be6" must not be a valid UUID
- "c4a760a8-dbcf-5254-a0d9-6a4474bd1b62" must not be a valid UUID version 5
