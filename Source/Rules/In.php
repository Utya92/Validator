<?php

namespace source\rules;

use source\rules\bridge\AbstractRulesBridge;


class In extends AbstractRulesBridge {

    public $searchValue;
    public $array;


    public function __construct($searchValue, $array) {
        $this->searchValue = $searchValue;
        $this->array = $array;
    }


    public function validate(): bool {
        return in_array($this->array, $this->searchValue);
    }
}