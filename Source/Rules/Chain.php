<?php

namespace source\rules;


use source\rules\bridge\AbstractRulesBridge;
use source\Validator;

class Chain extends AbstractRulesBridge {

    public bool $flag;
    public bool $isValid;

    public function __construct($flag, $classValidators) {
        $this->flag = $flag;
        $this->isValid = $classValidators;
    }

    public function validate(): bool {
        foreach (Validator::$resultsArr as $item) {
            if ($item !== $this->flag) {
                echo "not valid";
                return false;
            } else {
                echo "valid";
                return true;
            }
        }
        return false;
    }
}