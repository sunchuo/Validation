--CREDITS--
Henrique Moody <henriquemoody@gmail.com>
--DESCRIPTION--
The previous output was:

- All of the required rules must pass for `{ "A", "B", "B" }`
- Each item in `{ "A", "B", "B" }` must be valid
- "A" must equal 1
- "B" must equal 1
- "B" must equal 1
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\AllOfException;
use Respect\Validation\Validator as v;

try {
    $input_0 = ['A', 'B', 'B'];
    v::each(v::equals(1))->assert($input_0);
} catch (AllOfException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}
?>
--EXPECT--
- Each item in `{ "A", "B", "B" }` must be valid
  - "A" must equal 1
  - "B" must equal 1
  - "B" must equal 1
