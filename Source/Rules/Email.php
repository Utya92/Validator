<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class Email extends AbstractRulesBridge {

    public function validate($value): bool {
        $expression = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        return preg_match($expression, $value);
    }


}