<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class In extends AbstractRulesBridge {

    public function validate($searchValue, $array): bool {
        return in_array($array, $searchValue);
    }
}