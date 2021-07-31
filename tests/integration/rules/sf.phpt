--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SfException;
use Respect\Validation\Validator as v;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsNull;

try {
    $input_0 = 'something';
    v::sf(new IsNull())->check($input_0);
} catch (SfException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = null;
    v::not(v::sf(new IsNull()))->check($input_0);
} catch (SfException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'not-null';
    v::sf(new Email())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'example@example.com';
    v::not(v::sf(new Email()))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = ['second' => 'not-email'];
    v::sf(
        new Collection([
            'first' => new IsNull(),
            'second' => new Email(),
        ])
    )->check($input_0);
} catch (SfException $exception) {
    echo $exception->getMessage();
}
?>
--EXPECTF--
This value should be null.
`NULL` must not be valid for `[object] (Symfony\Component\Validator\Constraints\IsNull: { %s })`
- This value is not a valid email address.
- "example@example.com" must not be valid for `[object] (Symfony\Component\Validator\Constraints\Email: { %s })`
Array[first]:
    This field is missing. (code %s)
Array[second]:
    This value is not a valid email address. (code %s)
