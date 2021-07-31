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

use function ctype_digit;
use function is_int;

/**
 * Validates if the input is an integer.
 *
 * @author Adam Benson <adam.benson@bigcommerce.com>
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Andrei Drulchenko <andrdru@gmail.com>
 * @author Danilo Benevides <danilobenevides01@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class IntVal extends AbstractRule
{
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

        if (is_int($input)) {
            return true;
        }

        return ctype_digit($input);
    }
}
