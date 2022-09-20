<?php
declare(strict_types=1);

namespace source;

use source\rules\bridge\AbstractRulesBridge;


class Validator {

    public AbstractRulesBridge $rulesObject;

    protected bool $multipleMode = false;

    private string $rule;

    private array $validators = [];

    public function __construct() {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();
        if (method_exists($this, $function =
            'ConstructorWithArgument' . $numberOfArguments)) {
            call_user_func_array(
                array($this, $function), $arguments);
        }
    }

    public function ConstructorWithArgument1(string $rule) {
        $this->rule = $rule;
        $this->initialize();
    }

    public function ConstructorWithArgument2(string $rule, string $param) {
        $this->rule = $rule;
        $this->validators["params"] = $param;
        $this->initialize();
    }

    public function ConstructorWithArgument3(string $value, bool $multipleMode, array $arr) {
        $this->multipleMode = $multipleMode;


    }


    function initialize(): bool {
        $className = "source\\rules\\$this->rule";
        if (class_exists($className)) {
            $this->rulesObject = new $className(); //object(source\rules\MinLength)#3 (0) { } 1
            return true;
        }
        echo "such type >$this->rule< not found.. ";
        //в дальнейшем переделать на exception
        return false;
    }

    function exec($value): bool {
        return $this->rulesObject->validate($value, array_pop($this->validators));
    }

}