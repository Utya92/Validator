<?php

namespace source\rules;


use source\rules\bridge\AbstractRulesBridge;

class MinLength extends AbstractRulesBridge {

    public function validate($value, $param): bool {
        return strlen($value) <= $param;
    }
}