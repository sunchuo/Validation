--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'foo';
    v::when(v::alwaysInvalid(), v::alwaysValid())->check($input_0);
} catch (ValidationException $exception) {
    echo $exception->getMessage();
}
?>
--EXPECT--
"foo" is not valid
