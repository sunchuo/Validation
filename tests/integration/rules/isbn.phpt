--CREDITS--
Moritz Fromm <moritzgitfromm@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\IsbnException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'ISBN-12: 978-0-596-52068-7';
    v::isbn()->check($input_0);
} catch (IsbnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'ISBN-13: 978-0-596-52068-7';
    v::not(v::isbn())->check($input_0);
} catch (IsbnException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '978 10 596 52068 7';
    v::isbn()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = '978 0 596 52068 7';
    v::not(v::isbn())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"ISBN-12: 978-0-596-52068-7" must be a ISBN
"ISBN-13: 978-0-596-52068-7" must not be a ISBN
- "978 10 596 52068 7" must be a ISBN
- "978 0 596 52068 7" must not be a ISBN
