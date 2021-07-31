--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
Wojciech Frącz <fraczwojciech@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Rules\Instance;

try {
    $input_0 = 'test';
    (new Instance('stdClass'))->setTemplate('invalid object')->assert($input_0);
} catch (ValidationException $exception) {
    print_r($exception->getMessage());
}
?>
--EXPECT--
invalid object
