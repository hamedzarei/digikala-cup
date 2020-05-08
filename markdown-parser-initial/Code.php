<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:28 PM
 */
include_once 'RegexRule.php';

class Code extends RegexRule
{

    public function replacement()
    {
        return [
            '<code>$1</code>'
        ];
    }

    public function rule()
    {
        return [
            '/^`(.*)`$/m'
        ];
    }
}