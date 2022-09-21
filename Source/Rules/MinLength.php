<?php

namespace source\rules;


use source\rules\bridge\AbstractRulesBridge;

class MinLength extends AbstractRulesBridge {

    public $value;
    public $param;

    /**
     * @param $value
     * @param $param
     */
    public function __construct($value, $param) {
        $this->value = $value;
        $this->param = $param;
    }

    public function validate(): bool {
        return strlen($this->value) <= $this->param;
    }
}