<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class Regexp extends AbstractRulesBridge {

    private $expression;
    private $value;

    public function __construct($expression, $value) {
        $this->expression = $expression;
        $this->value = $value;
    }


    public function validate(): bool {
        return preg_match($this->value, $this->expression);
    }
}