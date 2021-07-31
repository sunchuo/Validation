<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Helpers\CanValidateIterable;

/**
 * Validates whether the pseudo-type of the input is iterable or not.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class IterableType extends AbstractRule
{
    use CanValidateIterable;

    private $default;

    public function __construct($default = null)
    {
        $this->default = $default;
    }

    /**
     * {@inheritDoc}
     */
    public function validate(&$input): bool
    {
        if ($input === null && $this->default !== null) {
            $input = $this->default;
        }

        return $this->isIterable($input);
    }
}
