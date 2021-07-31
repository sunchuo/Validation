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

namespace Respect\Validation\Test\Rules;

use Respect\Validation\Rules\AbstractRule;

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class Valid extends AbstractRule
{
    /**
     * {@inheritDoc}
     */
    public function validate(&$input): bool
    {
        return true;
    }
}
