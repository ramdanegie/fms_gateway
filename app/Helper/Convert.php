<?php

namespace App\Helper;

use Carbon\Carbon;

class Convert
{
    const DATE_FORMAT = "d/m/Y";
    const DATETIME_FORMAT = "d/m/Y H:i";

    public static function dateFormat(?string $datetime, string $format = "d/m/Y")
    {
        if (empty($datetime)) {
            return "";
        }

        return Carbon::parse($datetime)->format($format);
    }

    public static function parseFromFormat(string $format, string $str_date = null, string $outputFormat = "Y-m-d H:i")
    {
        if (empty($str_date)) {
            return null;
        }

        return Carbon::createFromFormat($format, $str_date)->format($outputFormat);
    }

    public static function issuedStatus($key)
    {
        $arr = [
            "PRO"  => "On Progress",
            "COMP" => "Complete",
            "REJ"  => "Reject",
            "CNL"  => "Cancel",
        ];

        return isset($arr[$key]) ? $arr[$key] : "Pending";
    }

    public static function toYesNoString($input)
    {
        if ($input == 1 || $input == true) {
            return "Yes";
        }

        return "No";
    }

    public static function toDept($str)
    {
        return isset(config("ticket-dept")[$str]) ? config("ticket-dept")[$str] : $str;
    }

    public static function shipmentType($key)
    {
        $map = config("shipment_type");
        return isset($map[$key]) ? $map[$key] : $key;
    }
}
