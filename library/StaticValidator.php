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

interface StaticValidator
{
    public static function allOf(Validatable ...$rule): ChainedValidator;

    public static function alnum($default = null, string ...$additionalChars): ChainedValidator;

    public static function alpha($default = null, string ...$additionalChars): ChainedValidator;

    public static function alwaysInvalid($default = null): ChainedValidator;

    public static function alwaysValid($default = null): ChainedValidator;

    public static function anyOf(Validatable ...$rule): ChainedValidator;

    public static function arrayType($default = null): ChainedValidator;

    public static function arrayVal($default = null): ChainedValidator;

    public static function attribute(
        string $reference,
        ?Validatable $validator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public static function base(int $base, $default = null, ?string $chars = null): ChainedValidator;

    public static function base64($default = null): ChainedValidator;

    /**
     * @param mixed $minimum
     * @param mixed $maximum
     */
    public static function between($minimum, $maximum): ChainedValidator;

    public static function boolType($default = null): ChainedValidator;

    public static function boolVal($default = null): ChainedValidator;

    public static function bsn($default = null): ChainedValidator;

    public static function call(callable $callable, Validatable $rule): ChainedValidator;

    public static function callableType($default = null): ChainedValidator;

    public static function callback(callable $callback): ChainedValidator;

    public static function charset($default = null, string ...$charset): ChainedValidator;

    public static function cnh($default = null): ChainedValidator;

    public static function cnpj($default = null): ChainedValidator;

    public static function control($default = null, string ...$additionalChars): ChainedValidator;

    public static function consonant($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $containsValue
     */
    public static function contains($containsValue, bool $identical = false, $default = null): ChainedValidator;

    /**
     * @param mixed[] $needles
     */
    public static function containsAny(array $needles, bool $strictCompareArray = false): ChainedValidator;

    public static function countable($default = null): ChainedValidator;

    public static function countryCode($default = null, ?string $set = null): ChainedValidator;

    public static function currencyCode($default = null): ChainedValidator;

    public static function cpf($default = null): ChainedValidator;

    public static function creditCard($default = null, ?string $brand = null): ChainedValidator;

    public static function date(string $format = 'Y-m-d', $default = null): ChainedValidator;

    public static function dateTime(?string $format = null, $default = null): ChainedValidator;

    public static function decimal(int $decimals, $default = null): ChainedValidator;

    public static function digit($default = null, string ...$additionalChars): ChainedValidator;

    public static function directory($default = null): ChainedValidator;

    public static function domain($default = null, bool $tldCheck = true): ChainedValidator;

    public static function each(Validatable $rule): ChainedValidator;

    public static function email($default = null): ChainedValidator;

    /**
     * @param mixed $endValue
     */
    public static function endsWith($endValue, bool $identical = false): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function equals($compareTo): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function equivalent($compareTo): ChainedValidator;

    public static function even($default = null): ChainedValidator;

    public static function executable($default = null): ChainedValidator;

    public static function exists($default = null): ChainedValidator;

    public static function extension(string $extension, $default = null): ChainedValidator;

    public static function factor(int $dividend, $default = null): ChainedValidator;

    public static function falseVal($default = null): ChainedValidator;

    public static function fibonacci($default = null): ChainedValidator;

    public static function file($default = null): ChainedValidator;

    /**
     * @param mixed[]|int $options
     */
    public static function filterVar(int $filter, $options = null): ChainedValidator;

    public static function finite($default = null): ChainedValidator;

    public static function floatVal($default = null): ChainedValidator;

    public static function floatType($default = null): ChainedValidator;

    public static function graph($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function greaterThan($compareTo): ChainedValidator;

    public static function hexRgbColor($default = null): ChainedValidator;

    public static function iban($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function identical($compareTo): ChainedValidator;

    public static function image(?finfo $fileInfo = null): ChainedValidator;

    public static function imei($default = null): ChainedValidator;

    /**
     * @param mixed[]|mixed $haystack
     */
    public static function in($haystack, bool $compareIdentical = false): ChainedValidator;

    public static function infinite($default = null): ChainedValidator;

    public static function instance(string $instanceName): ChainedValidator;

    public static function intVal($default = null): ChainedValidator;

    public static function intType($default = null): ChainedValidator;

    public static function ip(string $range = '*', $default = null, ?int $options = null): ChainedValidator;

    public static function isbn($default = null): ChainedValidator;

    public static function iterableType($default = null): ChainedValidator;

    public static function json($default = null): ChainedValidator;

    public static function key(
        string $reference,
        ?Validatable $referenceValidator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public static function keyNested(
        string $reference,
        ?Validatable $referenceValidator = null,
        bool $mandatory = true
    ): ChainedValidator;

    public static function keySet(Key ...$rule): ChainedValidator;

    public static function keyValue(string $comparedKey, string $ruleName, string $baseKey): ChainedValidator;

    public static function languageCode($default = null, ?string $set = null): ChainedValidator;

    public static function leapDate(string $format, $default = null): ChainedValidator;

    public static function leapYear($default = null): ChainedValidator;

    public static function length(?int $min = null, ?int $max = null, bool $inclusive = true): ChainedValidator;

    public static function lowercase($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function lessThan($compareTo): ChainedValidator;

    public static function luhn($default = null): ChainedValidator;

    public static function macAddress($default = null): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function max($compareTo): ChainedValidator;

    public static function maxAge(int $age, ?string $format = null): ChainedValidator;

    public static function mimetype(string $mimetype): ChainedValidator;

    /**
     * @param mixed $compareTo
     */
    public static function min($compareTo): ChainedValidator;

    public static function minAge(int $age, ?string $format = null): ChainedValidator;

    public static function multiple(int $multipleOf): ChainedValidator;

    public static function negative($default = null): ChainedValidator;

    public static function nfeAccessKey($default = null): ChainedValidator;

    public static function nif($default = null): ChainedValidator;

    public static function nip($default = null): ChainedValidator;

    public static function no(bool $useLocale = false): ChainedValidator;

    public static function noneOf(Validatable ...$rule): ChainedValidator;

    public static function not(Validatable $rule): ChainedValidator;

    public static function notBlank($default = null): ChainedValidator;

    public static function notEmoji($default = null): ChainedValidator;

    public static function notEmpty($default = null): ChainedValidator;

    public static function notOptional($default = null): ChainedValidator;

    public static function noWhitespace($default = null): ChainedValidator;

    public static function nullable(Validatable $rule): ChainedValidator;

    public static function nullType($default = null): ChainedValidator;

    public static function number($default = null): ChainedValidator;

    public static function numericVal($default = null): ChainedValidator;

    public static function objectType($default = null): ChainedValidator;

    public static function odd($default = null): ChainedValidator;

    public static function oneOf(Validatable ...$rule): ChainedValidator;

    public static function optional(Validatable $rule): ChainedValidator;

    public static function perfectSquare($default = null): ChainedValidator;

    public static function pesel($default = null): ChainedValidator;

    public static function phone($default = null): ChainedValidator;

    public static function phpLabel($default = null): ChainedValidator;

    public static function pis($default = null): ChainedValidator;

    public static function polishIdCard($default = null): ChainedValidator;

    public static function positive($default = null): ChainedValidator;

    public static function postalCode(string $countryCode, $default = null): ChainedValidator;

    public static function primeNumber($default = null): ChainedValidator;

    public static function printable($default = null, string ...$additionalChars): ChainedValidator;

    public static function punct($default = null, string ...$additionalChars): ChainedValidator;

    public static function readable($default = null): ChainedValidator;

    public static function regex(string $regex, $default = null): ChainedValidator;

    public static function resourceType($default = null): ChainedValidator;

    public static function roman($default = null): ChainedValidator;

    public static function scalarVal($default = null): ChainedValidator;

    public static function sf(Constraint $constraint, ?SymfonyValidator $validator = null): ChainedValidator;

    public static function size(?string $minSize = null, ?string $maxSize = null): ChainedValidator;

    public static function slug($default = null): ChainedValidator;

    public static function sorted(string $direction): ChainedValidator;

    public static function space($default = null, string ...$additionalChars): ChainedValidator;

    /**
     * @param mixed $startValue
     */
    public static function startsWith($startValue, bool $identical = false): ChainedValidator;

    public static function stringType($default = null): ChainedValidator;

    public static function stringVal($default = null): ChainedValidator;

    public static function subdivisionCode(string $countryCode, $default = null): ChainedValidator;

    /**
     * @param mixed[] $superset
     */
    public static function subset(array $superset): ChainedValidator;

    public static function symbolicLink($default = null): ChainedValidator;

    public static function time(string $format = 'H:i:s', $default = null): ChainedValidator;

    public static function tld($default = null): ChainedValidator;

    public static function trueVal($default = null): ChainedValidator;

    public static function type(string $type): ChainedValidator;

    public static function unique($default = null): ChainedValidator;

    public static function uploaded($default = null): ChainedValidator;

    public static function uppercase($default = null): ChainedValidator;

    public static function url($default = null): ChainedValidator;

    public static function uuid($default = null, ?int $version = null): ChainedValidator;

    public static function version($default = null): ChainedValidator;

    public static function videoUrl(?string $service = null): ChainedValidator;

    public static function vowel($default = null, string ...$additionalChars): ChainedValidator;

    public static function when(Validatable $if, Validatable $then, ?Validatable $else = null): ChainedValidator;

    public static function writable($default = null): ChainedValidator;

    public static function xdigit($default = null, string ...$additionalChars): ChainedValidator;

    public static function yes(bool $useLocale = false): ChainedValidator;

    /**
     * @param string|ZendValidator $validator
     * @param mixed[] $params
     */
    public static function zend($validator, ?array $params = null, $default = null): ChainedValidator;
}
