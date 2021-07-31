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

use Respect\Validation\Exceptions\ComponentException;

use function is_null;
use function mb_strlen;
use function mb_substr;
use function preg_match;
use function sprintf;

/**
 * Validate numbers in any base, even with non regular bases.
 *
 * @author Carlos André Ferrari <caferrari@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author William Espindola <oi@williamespindola.com.br>
 */
final class Base extends AbstractRule
{
    /**
     * @var string
     */
    private $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var int
     */
    private $base;

    private $default;

    /**
     * Initializes the Base rule.
     */
    public function __construct(int $base, ?string $default = null, ?string $chars = null)
    {
        if (!is_null($chars)) {
            $this->chars = $chars;
        }

        $max = mb_strlen($this->chars);
        if ($base > $max) {
            throw new ComponentException(sprintf('a base between 1 and %s is required', $max));
        }
        $this->base = $base;
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

        $valid = mb_substr($this->chars, 0, $this->base);

        return (bool) preg_match('@^[' . $valid . ']+$@', (string) $input);
    }
}
