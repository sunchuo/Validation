--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\VideoUrlException;
use Respect\Validation\Validator as v;

try {
    $input_0 = 'example.com';
    v::videoUrl()->check($input_0);
} catch (VideoUrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'example.com';
    v::videoUrl('YouTube')->check($input_0);
} catch (VideoUrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'https://player.vimeo.com/video/7178746722';
    v::not(v::videoUrl())->check($input_0);
} catch (VideoUrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'https://www.youtube.com/embed/netHLn9TScY';
    v::not(v::videoUrl('YouTube'))->check($input_0);
} catch (VideoUrlException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'example.com';
    v::videoUrl()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'example.com';
    v::videoUrl('Vimeo')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'https://youtu.be/netHLn9TScY';
    v::not(v::videoUrl())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'https://vimeo.com/71787467';
    v::not(v::videoUrl('Vimeo'))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
"example.com" must be a valid video URL
"example.com" must be a valid "YouTube" video URL
"https://player.vimeo.com/video/7178746722" must not be a valid video URL
"https://www.youtube.com/embed/netHLn9TScY" must not be a valid "YouTube" video URL
- "example.com" must be a valid video URL
- "example.com" must be a valid "Vimeo" video URL
- "https://youtu.be/netHLn9TScY" must not be a valid video URL
- "https://vimeo.com/71787467" must not be a valid "Vimeo" video URL
