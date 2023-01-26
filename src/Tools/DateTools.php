<?php

namespace Nerd4ever\Common\Tools;

use DateTime;

/**
 * Manipução de datas
 *
 * @package Nerd4ever\Common\Tools
 * @author Sileno de Oliveira Brito
 */
class DateTools
{
    public static function timeToSec(DateTime $when): int
    {
        return strtotime($when->format('H:i:s')) - strtotime('TODAY');
    }
}