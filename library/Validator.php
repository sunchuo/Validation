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

namespace Respect\Validation;

use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Rules\AllOf;

use function count;

/**
 *
 * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 * @author Henrique Moody <henriquemoody@gmail.com>

 * @method Validator allOf(Validatable ...$rule)
 * @method Validator alnum($default = null, string ...$additionalChars)
 * @method Validator alpha($default = null, string ...$additionalChars)
 * @method Validator alwaysInvalid($default = null)
 * @method Validator alwaysValid($default = null)
 * @method Validator anyOf(Validatable ...$rule)
 * @method Validator arrayType($default = null)
 * @method Validator arrayVal($default = null)
 * @method Validator attribute(string $reference, ?Validatable $validator = null, bool $mandatory = true)
 * @method Validator base(int $base, $default = null, ?string $chars = null)
 * @method Validator base64($default = null)
 * @method Validator between($minimum, $maximum)
 * @method Validator boolType($default = null)
 * @method Validator boolVal($default = null)
 * @method Validator bsn($default = null)
 * @method Validator call(callable $callable, Validatable $rule)
 * @method Validator callableType($default = null)
 * @method Validator callback(callable $callback)
 * @method Validator charset($default = null, string ...$charset)
 * @method Validator cnh($default = null)
 * @method Validator cnpj($default = null)
 * @method Validator control($default = null, string ...$additionalChars)
 * @method Validator consonant($default = null, string ...$additionalChars)
 * @method Validator contains($containsValue, bool $identical = false, $default = null)
 * @method Validator containsAny(array $needles, bool $strictCompareArray = false)
 * @method Validator countable($default = null)
 * @method Validator countryCode($default = null, ?string $set = null)
 * @method Validator currencyCode($default = null)
 * @method Validator cpf($default = null)
 * @method Validator creditCard($default = null, ?string $brand = null)
 * @method Validator date(string $format = 'Y-m-d', $default = null)
 * @method Validator dateTime(?string $format = null, $default = null)
 * @method Validator decimal(int $decimals, $default = null)
 * @method Validator digit($default = null, string ...$additionalChars)
 * @method Validator directory($default = null)
 * @method Validator domain($default = null, bool $tldCheck = true)
 * @method Validator each(Validatable $rule)
 * @method Validator email($default = null)
 * @method Validator endsWith($endValue, bool $identical = false)
 * @method Validator equals($compareTo)
 * @method Validator equivalent($compareTo)
 * @method Validator even($default = null)
 * @method Validator executable($default = null)
 * @method Validator exists($default = null)
 * @method Validator extension(string $extension, $default = null)
 * @method Validator factor(int $dividend, $default = null)
 * @method Validator falseVal($default = null)
 * @method Validator fibonacci($default = null)
 * @method Validator file($default = null)
 * @method Validator filterVar(int $filter, $options = null)
 * @method Validator finite($default = null)
 * @method Validator floatVal($default = null)
 * @method Validator floatType($default = null)
 * @method Validator graph($default = null, string ...$additionalChars)
 * @method Validator greaterThan($compareTo)
 * @method Validator hexRgbColor($default = null)
 * @method Validator iban($default = null)
 * @method Validator identical($compareTo)
 * @method Validator image(?finfo $fileInfo = null)
 * @method Validator imei($default = null)
 * @method Validator in($haystack, bool $compareIdentical = false)
 * @method Validator infinite($default = null)
 * @method Validator instance(string $instanceName)
 * @method Validator intVal($default = null)
 * @method Validator intType($default = null)
 * @method Validator ip(string $range = '*', $default = null, ?int $options = null)
 * @method Validator isbn($default = null)
 * @method Validator iterableType($default = null)
 * @method Validator json($default = null)
 * @method Validator key(string $reference, ?Validatable $referenceValidator = null, bool $mandatory = true)
 * @method Validator keyNested(string $reference, ?Validatable $referenceValidator = null, bool $mandatory = true)
 * @method Validator keySet(Key ...$rule)
 * @method Validator keyValue(string $comparedKey, string $ruleName, string $baseKey)
 * @method Validator languageCode($default = null, ?string $set = null)
 * @method Validator leapDate(string $format, $default = null)
 * @method Validator leapYear($default = null)
 * @method Validator length(?int $min = null, ?int $max = null, bool $inclusive = true)
 * @method Validator lowercase($default = null)
 * @method Validator lessThan($compareTo)
 * @method Validator luhn($default = null)
 * @method Validator macAddress($default = null)
 * @method Validator max($compareTo)
 * @method Validator maxAge(int $age, ?string $format = null)
 * @method Validator mimetype(string $mimetype)
 * @method Validator min($compareTo)
 * @method Validator minAge(int $age, ?string $format = null)
 * @method Validator multiple(int $multipleOf)
 * @method Validator negative($default = null)
 * @method Validator nfeAccessKey($default = null)
 * @method Validator nif($default = null)
 * @method Validator nip($default = null)
 * @method Validator no(bool $useLocale = false)
 * @method Validator noneOf(Validatable ...$rule)
 * @method Validator not(Validatable $rule)
 * @method Validator notBlank($default = null)
 * @method Validator notEmoji($default = null)
 * @method Validator notEmpty($default = null)
 * @method Validator notOptional($default = null)
 * @method Validator noWhitespace($default = null)
 * @method Validator nullable(Validatable $rule)
 * @method Validator nullType($default = null)
 * @method Validator number($default = null)
 * @method Validator numericVal($default = null)
 * @method Validator objectType($default = null)
 * @method Validator odd($default = null)
 * @method Validator oneOf(Validatable ...$rule)
 * @method Validator optional(Validatable $rule)
 * @method Validator perfectSquare($default = null)
 * @method Validator pesel($default = null)
 * @method Validator phone($default = null)
 * @method Validator phpLabel($default = null)
 * @method Validator pis($default = null)
 * @method Validator polishIdCard($default = null)
 * @method Validator positive($default = null)
 * @method Validator postalCode(string $countryCode, $default = null)
 * @method Validator primeNumber($default = null)
 * @method Validator printable($default = null, string ...$additionalChars)
 * @method Validator punct($default = null, string ...$additionalChars)
 * @method Validator readable($default = null)
 * @method Validator regex(string $regex, $default = null)
 * @method Validator resourceType($default = null)
 * @method Validator roman($default = null)
 * @method Validator scalarVal($default = null)
 * @method Validator sf(Constraint $constraint, ?SymfonyValidator $validator = null)
 * @method Validator size(?string $minSize = null, ?string $maxSize = null)
 * @method Validator slug($default = null)
 * @method Validator sorted(string $direction)
 * @method Validator space($default = null, string ...$additionalChars)
 * @method Validator startsWith($startValue, bool $identical = false)
 * @method Validator stringType($default = null)
 * @method Validator stringVal($default = null)
 * @method Validator subdivisionCode(string $countryCode, $default = null)
 * @method Validator subset(array $superset)
 * @method Validator symbolicLink($default = null)
 * @method Validator time(string $format = 'H:i:s', $default = null)
 * @method Validator tld($default = null)
 * @method Validator trueVal($default = null)
 * @method Validator type(string $type)
 * @method Validator unique($default = null)
 * @method Validator uploaded($default = null)
 * @method Validator uppercase($default = null)
 * @method Validator url($default = null)
 * @method Validator uuid($default = null, ?int $version = null)
 * @method Validator version($default = null)
 * @method Validator videoUrl(?string $service = null)
 * @method Validator vowel($default = null, string ...$additionalChars)
 * @method Validator when(Validatable $if, Validatable $then, ?Validatable $else = null)
 * @method Validator writable($default = null)
 * @method Validator xdigit($default = null, string ...$additionalChars)
 * @method Validator yes(bool $useLocale = false)
 * @method Validator zend($validator, ?array $params = null, $default = null)
 */
final class Validator extends AllOf
{
    /**
     * Create instance validator.
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * {@inheritDoc}
     */
    public function check(&$input): void
    {
        try {
            parent::check($input);
        } catch (ValidationException $exception) {
            if (count($this->getRules()) == 1 && $this->template) {
                $exception->updateTemplate($this->template);
            }

            throw $exception;
        }
    }

    /**
     * Creates a new Validator instance with a rule that was called on the static method.
     *
     * @param mixed[] $arguments
     *
     * @throws ComponentException
     */
    public static function __callStatic(string $ruleName, array $arguments): self
    {
        return self::create()->__call($ruleName, $arguments);
    }

    /**
     * Create a new rule by the name of the method and adds the rule to the chain.
     *
     * @param mixed[] $arguments
     *
     * @throws ComponentException
     */
    public function __call(string $ruleName, array $arguments): self
    {
        $this->addRule(Factory::getDefaultInstance()->rule($ruleName, $arguments));

        return $this;
    }
}
