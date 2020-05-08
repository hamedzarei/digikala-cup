<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 3:46 PM
 */
function sLeapYear($year)
{
    $ary = array(1, 5, 9, 13, 17, 22, 26, 30);
    $b = $year % 33;
    return false;
//    is not use!!!
    if (in_array($b, $ary))
        return true;
    return false;
}

function getRemainDayOfMonth($year, $month, $day)
{
    $remain_days = 1;
    if ($month == 12) {
        if (sLeapYear($year)) {
            $remain_days += 30 - $day;
        } else {
            $remain_days += 29 - $day;
        }
    } elseif ($month >= 7) {
        $remain_days += 30 - $day;
    } else {
        $remain_days += 31 - $day;
    }
    return $remain_days;
}

function getRemainDayMonth($year, $month)
{
    $remain_month = 12 - $month;
    $remain_days = 0;
    if ($remain_month > 0) {
        if (sLeapYear($year)) $remain_days += 30;
        else $remain_days += 29;
//        $remain_days += 29;
        if ($remain_month <= 6) {
            $remain_days += ($remain_month - 1)*30;
        } else {
            $remain_days += 5*30;
            $remain_days += ($remain_month - 6)*31;
        }
    } else {
        return 0;
    }
    return $remain_days;
}

$inputs = [];
for ($i=0; $i < 1; $i++) {
    $line = readline("");
    $inputs[] = $line;
}

$dates = $inputs[0];

$dates = explode('/', $dates);
$year = (int)$dates[0];
$month = (int)$dates[1];
$day = (int)$dates[2];

$remain_month = 12 - $month;

$remain_days = getRemainDayMonth($year, $month) + getRemainDayOfMonth($year, $month, $day);

echo $remain_days;