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

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validatable;

use function is_scalar;
use function PHPStan\dumpType;

/**
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Emmerson Siqueira <emmersonsiqueira@gmail.com>
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @author Nick Lombard <github@jigsoft.co.za>
 */
abstract class AbstractRelated extends AbstractRule
{
    /**
     * @var bool
     */
    private $mandatory = true;

    /**
     * @var mixed
     */
    private $reference;

    /**
     * @var Validatable|null
     */
    private $rule;

    /**
     * @param mixed $input
     */
    abstract public function hasReference($input): bool;

    /**
     * @param mixed $input
     *
     * @return mixed
     */
    abstract public function getReferenceValue($input);

    /**
     * @param mixed $reference
     */
    public function __construct($reference, ?Validatable $rule = null, bool $mandatory = true)
    {
        parent::__construct(null);

        $this->reference = $reference;
        $this->rule = $rule;
        $this->mandatory = $mandatory;

        if ($rule && $rule->getName() !== null) {
            $this->setName($rule->getName());
        } elseif (is_scalar($reference)) {
            $this->setName((string) $reference);
        }
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    public function isMandatory(): bool
    {
        return $this->mandatory;
    }

    public function getDefault()
    {
        if ($this->rule instanceof Validatable) {
            return $this->rule->getDefault();
        }
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): Validatable
    {
        parent::setName($name);

        if ($this->rule instanceof Validatable) {
            $this->rule->setName($name);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function assert(&$input): void
    {
        $hasReference = $this->hasReference($input);

        if ($this->mandatory && !$hasReference) {
            throw $this->reportError($input, ['hasReference' => false]);
        }

        if ($this->rule === null || !$hasReference) {
            return;
        }

        try {
            $value = $this->getReferenceValue($input);
            $this->rule->assert($value);
            $this->setReferenceValue($input, $value);

        } catch (ValidationException $validationException) {
            /** @var NestedValidationException $nestedValidationException */
            $nestedValidationException = $this->reportError($this->reference, ['hasReference' => true]);
            $nestedValidationException->addChild($validationException);

            throw $nestedValidationException;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function check(&$input): void
    {
        $hasReference = $this->hasReference($input);

        if ($this->mandatory && !$hasReference) {
            throw $this->reportError($input, ['hasReference' => false]);
        }

        if ($this->rule === null || !$hasReference) {
            return;
        }

        $value = $this->getReferenceValue($input);
        $this->rule->check($value);
        $this->setReferenceValue($input, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function validate(&$input): bool
    {
        $hasReference = $this->hasReference($input);
        if ($this->mandatory && !$hasReference) {
            return false;
        }

        if ($this->rule === null || !$hasReference) {
            return true;
        }

        $value = $this->getReferenceValue($input);
        $result =  $this->rule->validate($value);
        $this->setReferenceValue($input, $value);

        return $result;
    }
}
