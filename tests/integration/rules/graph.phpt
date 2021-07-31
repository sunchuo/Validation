--CREDITS--
Danilo Correa <danilosilva87@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\GraphException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

try {
    $input_0 = "foo\nbar";
    v::graph()->check($input_0);
} catch (GraphException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "foo\nbar";
    v::graph(null, 'foo')->check($input_0);
} catch (GraphException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = 'foobar';
    v::not(v::graph())->check($input_0);
} catch (GraphException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "foo\nbar";
    v::not(v::graph(null, "\n"))->check($input_0);
} catch (GraphException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    $input_0 = "foo\nbar";
    v::graph()->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = "foo\nbar";
    v::graph(null, 'foo')->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = 'foobar';
    v::not(v::graph())->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    $input_0 = "foo\nbar";
    v::not(v::graph(null, "\n"))->assert($input_0);
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"foo\nbar" must contain only graphical characters
"foo\nbar" must contain only graphical characters and "foo"
"foobar" must not contain graphical characters
"foo\nbar" must not contain graphical characters or "\n"
- "foo\nbar" must contain only graphical characters
- "foo\nbar" must contain only graphical characters and "foo"
- "foobar" must not contain graphical characters
- "foo\nbar" must not contain graphical characters or "\n"
