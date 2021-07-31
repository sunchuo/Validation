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

/**
 * @group rule
 *
 * @covers \Respect\Validation\Rules\AbstractFilterRule
 * @covers \Respect\Validation\Rules\Graph
 *
 * @author Andre Ramaciotti <andre@ramaciotti.com>
 * @author Gabriel Caruso <carusogabriel34@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Nick Lombard <github@jigsoft.co.za>
 * @author Pascal Borreli <pascal@borreli.com>
 */
final class GraphTest extends RuleTestCase
{
    /**
     * @inheritDoc
     */
    public function providerForValidInput(): array
    {
        $graph = new Graph();

        return [
            'String with special characters "LKA#@%.54"' => [$graph, 'LKA#@%.54'],
            'String "foobar"' => [$graph, 'foobar'],
            'String 16-50' => [$graph, '16-50'],
            'String 123' => [$graph, '123'],
            'String with special characters "#$%&*_"' => [$graph, '#$%&*_'],
            'Ignoring control characters "\n"' => [new Graph(null, "\n"), "#$%&*_\n~"],
            'Ignoring control characters "\n#\t&\r"' => [new Graph(null, "\n#\t&\r"), "#$%&*_\n~\t**\r"],
            'Ignoring character "_"' => [new Graph(null, '_'), 'abc\#$%&*_'],
            'Ignoring characters "# $"' => [new Graph(null, '# $'), '#$%&*_'],
            'Ignoring character with space' => [new Graph(null, ' '), '!@#$%^&*(){} abc 123'],
            'Ignoring control characters " \t\n"' => [new Graph(null, " \t\n"), "[]?+=/\\-_|\"',<>. \t \n abc 123"],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function providerForInvalidInput(): array
    {
        $graph = new Graph();

        return [
            'String empty' => [$graph, ''],
            'Parameter null' => [$graph, null],
            'String with "\n"' => [$graph, "foo\nbar"],
            'String with "\t"' => [$graph, "foo\tbar"],
            'String with "foo bar"' => [$graph, 'foo bar'],
            'String with space' => [$graph, ' '],
            'Igonring space' => [new Graph(null, ' '), "@__§¬¬¬\n"],
            'Ignoring control characters "foo\nbar"' => [new Graph(null, "foo\nbar"), "foo\nbar\ree"],
        ];
    }
}
