--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = [];
    v::key('firstname', v::notBlank()->setName('First Name'))->assert($input_0);
} catch (NestedValidationException $e) {
    print_r($e->getMessages());
}

?>
--EXPECTF--
Array
(
    [First Name] => First Name must be present
)
