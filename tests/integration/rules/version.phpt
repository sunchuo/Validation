--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\VersionException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '1.3.7--';
    v::version()->check($input_0);
} catch (VersionException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1.0.0-alpha';
    v::not(v::version())->check($input_0);
} catch (VersionException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '1.2.3.4-beta';
    v::version()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '1.3.7-rc.1';
    v::not(v::version())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"1.3.7--" must be a version
"1.0.0-alpha" must not be a version
- "1.2.3.4-beta" must be a version
- "1.3.7-rc.1" must not be a version
