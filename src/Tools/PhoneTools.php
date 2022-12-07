<?php

namespace Nerd4ever\Common\Tools;

use Exception;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class PhoneTools
{
    const DEFAULT_REGION = 'BR';
    const DEFAULT_COUNTRY_CODE = '55';
    const DEFAULT_LOCAL_AREA = '19';

    public static function toE164($number, ?string $defaultAreaCode = null, $defaultRegion = PhoneTools::DEFAULT_REGION)
    {
        $mValue = self::toStandard($number, $defaultAreaCode, $defaultRegion);
        return preg_replace("/[^0-9]/", "", $mValue);
    }

    public static function toLocal($number, $defaultAreaCode = null, $defaultRegion = PhoneTools::DEFAULT_REGION): ?string
    {
        try {
            $out = self::solve($number, $defaultAreaCode, $defaultRegion);
            if (!$out instanceof PhoneNumber) return null;
            if ($out->getCountryCode() === 55) return substr($out->getNationalNumber(), 0, 2);
            return null;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return null;
        }
    }

    private static function solve($number, $defaultAreaCode, $defaultRegion = PhoneTools::DEFAULT_REGION)
    {
        try {
            $mNumber = preg_replace("/[^0-9]/", "", $number);
            $mLength = strlen($mNumber);
            if ($mLength <= 7) return $mNumber;
            if ($mLength <= 10 && empty($defaultAreaCode)) return $mNumber;
            $oNumber = ($mLength > 9) ? $mNumber : ($defaultAreaCode . $mNumber);
            $out = PhoneNumberUtil::getInstance()->parse($oNumber, $defaultRegion);
            if (!$out instanceof PhoneNumber) return null;
            return $out;
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return null;
        }
    }

    public static function toStandard($number, $defaultAreaCode, $defaultRegion = PhoneTools::DEFAULT_REGION)
    {
        try {
            $mNumber = preg_replace("/[^0-9]/", "", $number);
            $out = self::solve($number, $defaultAreaCode, $defaultRegion);
            if (!$out instanceof PhoneNumber) return $mNumber;
            return PhoneNumberUtil::getInstance()->format($out, PhoneNumberFormat::E164);
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return $number;
        }
    }

    public static function isMobile(string $number, $defaultCountryCode = PhoneTools::DEFAULT_COUNTRY_CODE, $defaultAreaCode = PhoneTools::DEFAULT_LOCAL_AREA): bool
    {
        $e164 = self::toStandard($number, $defaultCountryCode, $defaultAreaCode);
        return substr($e164, 5, 1) == '9';
    }
}