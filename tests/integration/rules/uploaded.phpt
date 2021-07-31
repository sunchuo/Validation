--CREDITS--
Paul Karikari <paulkarikari1@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\UploadedException;
use Respect\Validation\Validator as v;

uopz_set_return('is_uploaded_file', false);
try {
    $input_0 = 'filename';
    v::uploaded()->check($input_0);
} catch (UploadedException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

uopz_set_return('is_uploaded_file', true);
try {
    $input_0 = 'filename';
    v::not(v::uploaded())->check($input_0);
} catch (UploadedException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

uopz_set_return('is_uploaded_file', false);
try {
    $input_0 = 'filename';
    v::uploaded()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

uopz_set_return('is_uploaded_file', true);
try {
    $input_0 = 'filename';
    v::not(v::uploaded())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--SKIPIF--
<?php
if (!extension_loaded('uopz')) {
    echo 'skip: Extension "uopz" is required to test "Uploaded" rule';
}
?>
--EXPECT--
"filename" must be an uploaded file
"filename" must not be an uploaded file
- "filename" must be an uploaded file
- "filename" must not be an uploaded file
