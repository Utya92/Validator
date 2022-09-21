<?php

require "Source\Validator.php";

use source\rules\Chain;
use source\Validator;

spl_autoload_register(function ($class) {
    $file = $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});


//$valid = new Validator('in', "text");
//$arr = ["opira","opira",'text'];
//echo $valid->exec($arr);
//
//$valid = new Validator('email');
//echo $valid->exec("abc@gmail.com" );
//
//
//$valid = new Validator('minlength', 5);
//echo $valid->exec("asx");

//
//$valid = new Validator('test', true, [
//    new Validator('minlength', 1000),
//    new Validator('regexp', '/test/'),
//    new Validator('email')]);

//
//$valid = new Validator('email');
//echo $valid->exec("test@gmail.com");
//
//$valid = new Validator('minlength', '5');
//
//$valid = new Validator('in', "text");
//
//$valid = new Validator('regexp', '/test/');


(new Chain())
    ->add('minlength', 15)
    ->add("email")
    ->add("regexp",'/test@gmail.com/')
    ->exec("test@gmail.com");


