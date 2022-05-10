<?php

namespace App\Helper;

class Common
{
    public static function isRequireMSDS(string $item)
    {
        return in_array(trim($item), config("require_msds"));
    }

    public static function getExtention($filename, bool $withDot = false)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        return ($withDot) ? ".{$ext}" : $ext;
    }

    public static function parseNotifi($notifi_type, $payload)
    {
        if (!isset(config('notification_text')[$notifi_type])) {
            return "template_undefined";
        }

        $template = config('notification_text')[$notifi_type];
        foreach ($payload as $key => $value) {
            $key = "[{$key}]";
            $template = str_replace($key, $value, $template);
        }

        return $template;
    }

    public static function getWeeks($date, $rollover = 'Sunday')
    {
        $cut = substr($date, 0, 8);
        $daylen = 86400;

        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;

        $weeks = 1;

        $startWeek = "";
        for ($i = 1; $i <= $elapsed; $i++) {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);
            $day = strtolower(date("l", $daytimestamp));

            if ($day == strtolower($rollover)) {
                $startWeek = $dayfind;
                $weeks++;
            };
        }

        return [$startWeek, $weeks];
    }
}
