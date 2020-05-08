<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:29 PM
 */
include_once 'RegexRule.php';

class HorizontalRule extends RegexRule
{

    public function replacement()
    {
        return [
            '<hr>'
        ];
    }

    public function rule()
    {
        return [
            '/^-{3,}$/m'
        ];
    }
}