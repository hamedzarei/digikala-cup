<?php

include_once 'Header.php';
include_once 'Bold.php';
include_once 'Italic.php';
include_once 'Link.php';
include_once 'Code.php';
include_once 'HorizontalRule.php';
include_once 'Image.php';

class MarkdownParser
{
    public $rules = [];

    public function __construct()
    {
        $default_rules = [
            'Header',
            'Bold',
            'Italic',
            'Image',
            'Link',
            'Code',
            'HorizontalRule'
        ];
        foreach ($default_rules as $rule) {
            if (class_exists($rule)) {
                $this->rules[] = new $rule();
            }
        }
    }

    public function addRule($rule)
    {
        $this->rules[] = $rule;
    }

    public function render($content)
    {
        var_dump($this->rules);
        foreach ($this->rules as $rule) {
            $content = $rule->parse($content);
        }

        return $content;
    }
}

$mp = new MarkdownParser();
var_dump($mp->render('**bold 1**
__bold 2__
*italic 1*
_italic 2_'));
