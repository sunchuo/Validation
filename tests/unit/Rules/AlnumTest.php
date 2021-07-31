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

use Respect\Validation\Test\RuleTestCase;
use stdClass;

/**
 * @group rule
 *
 * @covers \Respect\Validation\Rules\AbstractFilterRule
 * @covers \Respect\Validation\Rules\Alnum
 *
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Gabriel Caruso <carusogabriel34@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Islam Elshobokshy <islam20088@hotmail.com>
 * @author Nick Lombard <github@jigsoft.co.za>
 * @author Pascal Borreli <pascal@borreli.com>
 */
final class AlnumTest extends RuleTestCase
{
    /**
     * {@inheritDoc}
     */
    public function providerForValidInput(): array
    {
        return [
            [new Alnum(), 'alganet'],
            [new Alnum(null, '- ! :'), 'foo :- 123 !'],
            [new Alnum(null, '0-9'), '0alg-anet0'],
            [new Alnum(), '1'],
            [new Alnum(), 'a'],
            [new Alnum(), 'foobar'],
            [new Alnum(null, '_'), 'rubinho_'],
            [new Alnum(null, '.'), 'google.com'],
            [new Alnum(null, ' '), 'alganet alganet'],
            [new Alnum(), 0],
            [new Alnum(null, '!@#$%^&*(){}'), '!@#$%^&*(){}abc123'],
            [new Alnum(null, '[]?+=/\\-_|"\',<>.'), '[]?+=/\\-_|"\',<>.abc123'],
            [new Alnum(null, "[]?+=/\\-_|\"',<>. \t\n"), "abc[]?+=/\\-_|\"',<>. \t\n123"],
            [new Alnum(null, '-', '*'), 'a-1*d'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function providerForInvalidInput(): array
    {
        return [
            [new Alnum(), ''],
            [new Alnum(), 'number 100%'],
            [new Alnum(null, '%'), 'number 100%'],
            [new Alnum(), '@#$'],
            [new Alnum(), '_'],
            [new Alnum(), 'dgç'],
            [new Alnum(), 1e21],
            [new Alnum(), null],
            [new Alnum(), new stdClass()],
            [new Alnum(), []],
            [new Alnum(null, '%'), 'number 100%'],
            [new Alnum(), "\t"],
            [new Alnum(), "\n"],
            [new Alnum(), "\nabc"],
            [new Alnum(), "\tdef"],
            [new Alnum(), "\nabc \t"],
            [new Alnum(), 'alganet alganet'],
        ];
    }
}
