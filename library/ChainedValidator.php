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

use finfo;
use Respect\Validation\Rules\Key;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidator;
use Zend\Validator\ValidatorInterface as ZendValidator;

interface ChainedValidator extends Validatable
{
    public function allOf(Validatable ...$rule): ChainedValidator;

    public function alnum($default = null, string ...$additionalChars): ChainedValidator;

    public function alpha($default = null, string ...$additionalChars): ChainedValidator;

    public function alwaysInvalid(): ChainedValidator;

    public function alwaysValid(): ChainedValidator;

    public function anyOf(Validatable ...$rule): ChainedValidator;

    public function arrayType($default = null): ChainedValidator;

    public function arrayVal($default = null): ChainedValidator;

    public function attribute(
        string $reference,
        ?Validatable $validator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public function base(int $base, $default = null, ?string $chars = null): ChainedValidator;

    public function base64($default = null): ChainedValidator;

    /**
     * @param mixed $minimum
     * @param mixed $maximum
     */
    public function between($minimum, $maximum): ChainedValidator;

    public function bic(string $countryCode): ChainedValidator;

    public function boolType($default = null): ChainedValidator;

    public function boolVal($default = null): ChainedValidator;

    public function bsn($default = null): ChainedValidator;

    public function call(callable $callable, Validatable $rule): ChainedValidator;

    public function callableType(): ChainedValidator;

    public function callback(callable $callback): ChainedValidator;

    public function charset(string ...$charset): ChainedValidator;

    public function cnh($default = null): ChainedValidator;

    public function cnpj($default = null): ChainedValidator;

    public function control($default = null, string ...$additionalChars): ChainedValidator;

    public function consonant($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $containsValue
     */
    public function contains($containsValue, bool $identical = false): ChainedValidator;

    /**
     * @param mixed[] $needles
     */
    public function containsAny(array $needles, bool $strictCompareArray = false): ChainedValidator;

    public function countable($default = null): ChainedValidator;

    public function countryCode($default = null, ?string $set = null): ChainedValidator;

    public function currencyCode($default = null): ChainedValidator;

    public function cpf($default = null): ChainedValidator;

    public function creditCard($default = null, ?string $brand = null): ChainedValidator;

    public function date(string $format = 'Y-m-d', $default = null): ChainedValidator;

    public function dateTime(?string $format = null, $default = null): ChainedValidator;

    public function decimal(int $decimals, $default = null): ChainedValidator;

    public function digit($default = null, string ...$additionalChars): ChainedValidator;

    public function directory($default = null): ChainedValidator;

    public function domain($default = null, bool $tldCheck = true): ChainedValidator;

    public function each(Validatable $rule): ChainedValidator;

    public function email($default = null): ChainedValidator;

    /**
     * @param mixed $endValue
     */
    public function endsWith($endValue, bool $identical = false): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function equals($compareTo): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function equivalent($compareTo): ChainedValidator;

    public function even(): ChainedValidator;

    public function executable(): ChainedValidator;

    public function exists(): ChainedValidator;

    public function extension(string $extension): ChainedValidator;

    public function factor(int $dividend): ChainedValidator;

    public function falseVal(): ChainedValidator;

    public function fibonacci(): ChainedValidator;

    public function file(): ChainedValidator;

    /**
     * @param mixed[]|int $options
     */
    public function filterVar(int $filter, $options = null): ChainedValidator;

    public function finite(): ChainedValidator;

    public function floatVal($default = null): ChainedValidator;

    public function floatType($default = null): ChainedValidator;

    public function graph($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function greaterThan($compareTo): ChainedValidator;

    public function hexRgbColor(): ChainedValidator;

    public function iban($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function identical($compareTo): ChainedValidator;

    public function image(?finfo $fileInfo = null): ChainedValidator;

    public function imei($default = null): ChainedValidator;

    /**
     * @param mixed[]|mixed $haystack
     */
    public function in($haystack, bool $compareIdentical = false): ChainedValidator;

    public function infinite($default = null): ChainedValidator;

    public function instance(string $instanceName, $default = null): ChainedValidator;

    public function intVal($default = null): ChainedValidator;

    public function intType($default = null): ChainedValidator;

    public function ip(string $range = '*', $default = null, ?int $options = null): ChainedValidator;

    public function isbn($default = null): ChainedValidator;

    public function iterableType($default = null): ChainedValidator;

    public function json($default = null): ChainedValidator;

    public function key(
        string $reference,
        ?Validatable $referenceValidator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public function keyNested(
        string $reference,
        ?Validatable $referenceValidator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public function keySet(Key ...$rule): ChainedValidator;

    public function keyValue(string $comparedKey, string $ruleName, string $baseKey): ChainedValidator;

    public function languageCode($default = null, ?string $set = null): ChainedValidator;

    public function leapDate($default = null, string $format): ChainedValidator;

    public function leapYear($default = null): ChainedValidator;

    public function length(?int $min = null, ?int $max = null, bool $inclusive = true): ChainedValidator;

    public function lowercase($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function lessThan($compareTo): ChainedValidator;

    public function luhn($default = null): ChainedValidator;

    public function macAddress($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function max($compareTo): ChainedValidator;

    public function maxAge(int $age, ?string $format = null): ChainedValidator;

    public function mimetype(string $mimetype): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public function min($compareTo): ChainedValidator;

    public function minAge(int $age, ?string $format = null): ChainedValidator;

    public function multiple(int $multipleOf): ChainedValidator;

    public function negative($default = null): ChainedValidator;

    public function nfeAccessKey($default = null): ChainedValidator;

    public function nif($default = null): ChainedValidator;

    public function nip($default = null): ChainedValidator;

    public function no(bool $useLocale = false): ChainedValidator;

    public function noneOf(Validatable ...$rule): ChainedValidator;

    public function not(Validatable $rule): ChainedValidator;

    public function notBlank(): ChainedValidator;

    public function notEmoji(): ChainedValidator;

    public function notEmpty(): ChainedValidator;

    public function notOptional(): ChainedValidator;

    public function noWhitespace(): ChainedValidator;

    public function nullable(Validatable $rule): ChainedValidator;

    public function nullType(): ChainedValidator;

    public function number($default = null): ChainedValidator;

    public function numericVal($default = null): ChainedValidator;

    public function objectType($default = null): ChainedValidator;

    public function odd($default = null): ChainedValidator;

    public function oneOf(Validatable ...$rule): ChainedValidator;

    public function optional(Validatable $rule): ChainedValidator;

    public function perfectSquare($default = null): ChainedValidator;

    public function pesel($default = null): ChainedValidator;

    public function phone($default = null): ChainedValidator;

    public function phpLabel($default = null): ChainedValidator;

    public function pis($default = null): ChainedValidator;

    public function polishIdCard($default = null): ChainedValidator;

    public function positive($default = null): ChainedValidator;

    public function postalCode(string $countryCode, $default = null): ChainedValidator;

    public function primeNumber($default = null): ChainedValidator;

    public function printable($default = null, string ...$additionalChars): ChainedValidator;

    public function punct($default = null, string ...$additionalChars): ChainedValidator;

    public function readable($default = null): ChainedValidator;

    public function regex(string $regex, $default = null): ChainedValidator;

    public function resourceType($default = null): ChainedValidator;

    public function roman($default = null): ChainedValidator;

    public function scalarVal($default = null): ChainedValidator;

    public function sf(Constraint $constraint, ?SymfonyValidator $validator = null): ChainedValidator;

    public function size(?string $minSize = null, ?string $maxSize = null): ChainedValidator;

    public function slug($default = null): ChainedValidator;

    public function sorted(string $direction): ChainedValidator;

    public function space($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $startValue
     */
    public function startsWith($startValue, bool $identical = false): ChainedValidator;

    public function stringType($default = null): ChainedValidator;

    public function stringVal($default = null): ChainedValidator;

    public function subdivisionCode(string $countryCode, $default = null): ChainedValidator;

    /**
     * @param mixed[] $superset
     */
    public function subset(array $superset): ChainedValidator;

    public function symbolicLink(): ChainedValidator;

    public function time(string $format = 'H:i:s', $default = null): ChainedValidator;

    public function tld($default = null): ChainedValidator;

    public function trueVal(): ChainedValidator;

    public function type(string $type): ChainedValidator;

    public function unique(): ChainedValidator;

    public function uploaded(): ChainedValidator;

    public function uppercase($default = null): ChainedValidator;

    public function url($default = null): ChainedValidator;

    public function uuid($default = null, ?int $version = null): ChainedValidator;

    public function version($default = null): ChainedValidator;

    public function videoUrl(?string $service = null): ChainedValidator;

    public function vowel($default = null, string ...$additionalChars): ChainedValidator;

    public function when(Validatable $if, Validatable $then, ?Validatable $else = null): ChainedValidator;

    public function writable(): ChainedValidator;

    public function xdigit($default = null, string ...$additionalChars): ChainedValidator;

    public function yes(bool $useLocale = false): ChainedValidator;

    /**
     * @param string|ZendValidator $validator
     * @param mixed[] $params
     */
    public function zend($validator, ?array $params = null, $default = null): ChainedValidator;
}
