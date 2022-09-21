<?php

namespace source\rules;


use source\rules\bridge\AbstractRulesBridge;

class Chain {
//(new Chain())
//->add(new MinLength(3))
//->add(new MaxLength(5))
    public AbstractRulesBridge $abstractRulesBridge;

    private $value;

    public bool $result;

    public array $rulesContainer;

    public function add(string $validator, $param = ''): Chain {
        $this->rulesContainer[$validator] = $param;
        return $this;
    }

    public function exec($value) {
        $res = true;
        $this->value = $value;
        foreach ($this->rulesContainer as $key => $val) {
            $className = "source\\rules\\$key";
            $obj = $this->abstractRulesBridge = new $className($value, $val);
            if (!$obj->validate()) {
                $res = false;
                break;
            }
        }
        if ($res) {
            echo "valid";
        }else{
            echo "not valid";
        }
        return $res;
    }
}