<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 3:43 PM
 */
function gLeapYear($year)
{
    if (($year % 4 == 0) and (($year % 100 != 0) or ($year % 400 == 0)))
        return 'hast';
    else
        return 'nist';
}

function sLeapYear($year)
{
    $ary = array(1, 5, 9, 13, 17, 22, 26, 30);
    $b = $year % 33;
    if (in_array($b, $ary))
        return 'hast';
    return 'nist';
}

echo "\n";
echo "1399: ", sLeapYear(1396).' ';
echo gLeapYear(2013);