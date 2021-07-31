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

use DateTimeInterface;

use function date;
use function is_numeric;
use function is_scalar;
use function sprintf;
use function strtotime;

/**
 * Validates if a year is leap.
 *
 * @author Danilo Correa <danilosilva87@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Jayson Reis <santosdosreis@gmail.com>
 */
final class LeapYear extends AbstractRule
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

        if (is_numeric($input)) {
            $date = strtotime(sprintf('%d-02-29', (int) $input));

            return (bool) date('L', (int) $date);
        }

        if (is_scalar($input)) {
            $params = (int) date('Y', (int) strtotime((string) $input));

            return $this->validate($params);
        }

        if ($input instanceof DateTimeInterface) {
            $params = $input->format('Y');

            return $this->validate($params);
        }

        return false;
    }
}
