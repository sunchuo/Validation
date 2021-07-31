--CREDITS--
Edson Lima <dddwebdeveloper@gmail.com>
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 41;
    v::not(v::intType()->between(1, 42))->assert($input_0);
} catch (AllOfException $e) {
    echo $e->getFullMessage();
}
?>
--EXPECT--
- 41 must not be between 1 and 42
