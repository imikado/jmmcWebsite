<?php

namespace MyWebsite\Helper;

use DateTime;

class FormatHelper
{
    public static $dayList = [
        'Dimanche',
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi'
    ];

    public static $monthList = [
        '',
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre'


    ];

    public static function formatDate(String $dateTimeString)
    {
        $datetime = new DateTime($dateTimeString);
        return $datetime->format('d/m/Y');
    }

    public static function formatLongDate(String $dateTimeString)
    {
        $datetime = new DateTime($dateTimeString);

        $day = $datetime->format('d');
        $dayOfTheWeek = (int) $datetime->format('w');
        $monthNumber = (int)$datetime->format('m');

        $dateTimeString = self::$dayList[$dayOfTheWeek];
        $dateTimeString .= ' ' . $day;
        $dateTimeString .= ' ' . self::$monthList[$monthNumber];

        return $dateTimeString;
    }
}
