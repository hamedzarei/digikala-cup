<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:06 PM
 */
include_once 'RegexRule.php';

class Bold extends RegexRule
{

    public function replacement()
    {
        return [
            '<b>$1</b>',
            '<b>$1</b>'
        ];
    }

    public function rule()
    {
        return [
            '/^\*\*(.*)\*\*$/m',
            '/^__(.*)__$/m',
        ];
    }
}