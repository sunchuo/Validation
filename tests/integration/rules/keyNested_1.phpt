--CREDITS--
Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
Henrique Moody <henriquemoody@gmail.com>
Ivan Zinovyev <vanyazin@gmail.com>
--TEST--
keyNested()
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Validator as v;

$array = [
    'foo' => [
        'bar' => 123,
    ],
];

$object = new stdClass();
$object->foo = new stdClass();
$object->foo->bar = 42;

$input_0 = ['foo.bar.baz' => false];
$input_1 = new ArrayObject($array);
var_dump(v::keyNested('foo.bar.baz')->validate($input_0));
var_dump(v::keyNested('foo.bar')->validate($array));
var_dump(v::keyNested('foo.bar')->validate($input_1));
var_dump(v::keyNested('foo.bar', v::negative())->validate($array));
var_dump(v::keyNested('foo.bar')->validate($object));
var_dump(v::keyNested('foo.bar', v::stringType())->validate($object));
var_dump(v::keyNested('foo.bar.baz', v::notEmpty(), false)->validate($object));
?>
--EXPECT--
bool(false)
bool(true)
bool(true)
bool(false)
bool(true)
bool(false)
bool(true)
