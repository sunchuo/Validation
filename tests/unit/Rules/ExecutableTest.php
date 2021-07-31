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
use SplFileInfo;
use SplFileObject;

/**
 * @group rule
 *
 * @covers \Respect\Validation\Rules\Executable
 *
 * @author Gabriel Caruso <carusogabriel34@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Royall Spence <royall@royall.us>
 * @author William Espindola <oi@williamespindola.com.br>
 */
final class ExecutableTest extends RuleTestCase
{
    /**
     * {@inheritDoc}
     */
    public function providerForValidInput(): array
    {
        return [
            [new Executable(), 'tests/fixtures/executable'],
            [new Executable(), new SplFileInfo('tests/fixtures/executable')],
            [new Executable(), new SplFileObject('tests/fixtures/executable')],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function providerForInvalidInput(): array
    {
        return [
            [new Executable(), 'tests/fixtures/valid-image.gif'],
            [new Executable(), new SplFileInfo('tests/fixtures/valid-image.jpg')],
            [new Executable(), new SplFileObject('tests/fixtures/valid-image.png')],
        ];
    }
}
