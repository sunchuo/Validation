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

use function is_numeric;

/**
 * Validates whether the input is a positive number.
 *
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Ismael Elias <ismael.esq@hotmail.com>
 */
final class Positive extends AbstractRule
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

        if (!is_numeric($input)) {
            return false;
        }

        return $input > 0;
    }
}
