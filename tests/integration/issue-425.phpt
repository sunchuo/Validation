--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator as v;

$validator = v::create()
    ->key('age', v::intType()->notEmpty()->noneOf(v::stringType()))
    ->key('reference', v::stringType()->notEmpty()->length(1, 50));

try {
    $input_0 = ['age' => 1];
    $validator->assert($input_0);
} catch (AllOfException $e) {
    echo $e->getFullMessage();
}

echo PHP_EOL;

try {
    $input_0 = ['reference' => 'QSF1234'];
    $validator->assert($input_0);
} catch (AllOfException $e) {
    echo $e->getFullMessage();
}
?>
--EXPECT--
- These rules must pass for `{ "age": 1 }`
  - reference must be present
- These rules must pass for `{ "reference": "QSF1234" }`
  - age must be present
