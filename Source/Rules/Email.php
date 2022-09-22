<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class Email extends AbstractRulesBridge {

    public string $value;

    public function __construct($value) {
        $this->value = $value;

    }

    public function validate(): bool {
        $expression = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        return preg_match($expression, $this->value);
    }


}