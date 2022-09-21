<?php
declare(strict_types=1);

namespace source;

use source\rules\bridge\AbstractRulesBridge;


class Validator {


    private AbstractRulesBridge $abstractRulesBridge;
    //- правило для валидации
//    private $rule;

    //тут будет хранится строковое представление
//класса валидации
    private $validator;
    private $param;


    //массив с входящими данными
    public $valueForValidation;


    public function __construct($validator, $param = '') {
        $this->validator = $validator;
        $this->param = $param;

    }

    function exec($value): bool {
        $this->valueForValidation = $value;
        return $this->initialize();
    }


/// new source\rules\MinLength(3)

    function initialize(): bool {
        $className = "source\\rules\\$this->validator";
        if (class_exists($className)) {
            $obj = $this->abstractRulesBridge = new $className($this->valueForValidation, $this->param); //object(source\rules\MinLength)#3 (0) { } 1
            return $obj->validate();
        }
        return false;
    }


}