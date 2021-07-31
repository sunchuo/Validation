--CREDITS--
Mazen Touati <mazen_touati@hotmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NotEmojiException;
use Respect\Validation\Validator as v;

try {
    $input_0 = '🍕';
    v::notEmoji()->check($input_0);
} catch (NotEmojiException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'AB';
    v::not(v::notEmoji())->check($input_0);
} catch (NotEmojiException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = '🏄';
    v::notEmoji()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'YZ';
    v::not(v::notEmoji())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"🍕" must not contain an Emoji
"AB" must contain an Emoji
- "🏄" must not contain an Emoji
- "YZ" must contain an Emoji
