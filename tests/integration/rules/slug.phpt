--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
Marcel dos Santos <marcelgsantos@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\SlugException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'my-Slug';
    v::slug()->check($input_0);
} catch (SlugException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'my-slug';
    v::not(v::slug())->check($input_0);
} catch (SlugException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'my-Slug';
    v::slug()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'my-slug';
    v::not(v::slug())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"my-Slug" must be a valid slug
"my-slug" must not be a valid slug
- "my-Slug" must be a valid slug
- "my-slug" must not be a valid slug
