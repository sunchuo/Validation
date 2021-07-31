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

/**
 * Validates if the input is a Roman numeral.
 *
 * @author Alexander Wühr <wuehr@sc-networks.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Jean Pimentel <jeanfap@gmail.com>
 */
final class Roman extends AbstractEnvelope
{
    private $default;

    public function __construct($default = null)
    {
        $this->default = $default;
        parent::__construct(new Regex('/^(?=[MDCLXVI])M*(C[MD]|D?C{0,3})(X[CL]|L?X{0,3})(I[XV]|V?I{0,3})$/'));
    }

    public function validate(&$input): bool
    {
        if ($input === null && $this->default !== null) {
            $input = $this->default;
        }

        return parent::validate($input);
    }
}
