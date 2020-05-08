<?php

include_once 'RuleInterface.php';

interface RegexRuleInterface extends RuleInterface
{
    public function rule();
}
