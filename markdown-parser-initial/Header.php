<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 5/8/20
 * Time: 4:46 PM
 */
include_once 'RegexRule.php';

class Header extends RegexRule
{

    public function replacement()
    {
        return [
            '<h3>$1</h3>',
            '<h3>$1</h3>',
            '<h3>$1</h3>',
            '<h3>$1</h3>',
            '<h3>$1</h3>',
            '<h3>$1</h3>',
        ];
    }

    public function rule()
    {
        return [
            '/^######\s*(.*)$/m',
            '/^#####\s*(.*)$/m',
            '/^####\s*(.*)$/m',
            '/^###\s*(.*)$/m',
            '/^##\s*(.*)$/m',
            '/^#\s*(.*)$/m',
        ];
    }
}