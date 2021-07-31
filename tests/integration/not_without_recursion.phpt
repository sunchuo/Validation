--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--TEST--
not() with recursion should update mode of its children
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

try {
    $validator = Validator::not(
        Validator::intVal()->positive()
    );
    $input_0 = 2;
    $validator->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
?>
--EXPECT--
2 must not be positive
