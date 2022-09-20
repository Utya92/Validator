<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class Regexp extends AbstractRulesBridge {

    public function validate($value, $expression): bool {
        return preg_match($expression, $value);

    }
}