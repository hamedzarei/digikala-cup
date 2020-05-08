<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 5:06 PM
 */
include_once 'RegexRule.php';

class Italic extends RegexRule
{

    public function replacement()
    {
        return [
            '<i>$1</i>',
            '<i>$1</i>'
        ];
    }

    public function rule()
    {
        return [
            '/^\*(.*)\*$/m',
            '/^_(.*)_$/m',
        ];
    }
}