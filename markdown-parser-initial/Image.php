<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:25 PM
 */
include_once 'RegexRule.php';

class Image extends RegexRule
{

    public function replacement()
    {
        return [
            '<img src="$2" alt="$1">'
        ];
    }

    public function rule()
    {
        return [
            '/^!\[(.*)\]\((.*)\)$/m'
        ];
    }
}