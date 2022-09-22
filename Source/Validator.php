<?php
declare(strict_types=1);

namespace source;

use source\rules\bridge\AbstractRulesBridge;


class Validator {

    private AbstractRulesBridge $abstractRulesBridge;
    private $validator;
    private $param1;
    private $param2;
    
    public static array $resultsArr;

    public static $valueForValidation;

    public function __construct($validator, $param1 = '', $param2 = '') {
        $this->validator = $validator;
        $this->param1 = $param1;
        $this->param2 = $param2;
    }

    function exec($value): bool {
        Validator::$valueForValidation = $value;
        return $this->initialize();
    }

    function initialize(): bool {
        $className = "source\\rules\\$this->validator";
        if (class_exists($className) && strtolower($this->validator) != 'chain') {
            $obj = $this->abstractRulesBridge = new $className(Validator::$valueForValidation, $this->param1, $this->param2); //object(source\rules\MinLength)#3 (0) { } 1
            return $obj->validate();
        }
        if (class_exists($className) && strtolower($this->validator) == 'chain') {
            $obj = $this->abstractRulesBridge = new $className(Validator::$valueForValidation, $this->param1, $this->param2); //object(source\rules\MinLength)#3 (0) { } 1
            foreach ($this->param2 as $i) {
                $vars = get_object_vars($i);
                $shortName = $vars['validator'];
                $chainClassName = "source\\rules\\$shortName";
                $chainObj = $this->abstractRulesBridge = new $chainClassName(Validator::$valueForValidation, $vars['param1'], $vars['param2']);
                Validator::$resultsArr[] = $chainObj->validate();
            }
            return $obj->validate();
        }
        return false;
    }
}
