<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:21 PM
 */
include_once 'RegexRule.php';

class Link extends RegexRule
{

    public function replacement()
    {
        return [
            '<a href="$2">$1</a>'
        ];
    }

    public function rule()
    {
        return [
            '/^\[(.*)\]\((.*)\)$/m'
        ];
    }
}