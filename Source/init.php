<?php

require "Source\Validator.php";

use source\Validator;

spl_autoload_register(function ($class) {
    $file = $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});


$valid = new Validator('in', "text");
$arr = ["opira","opira",'text'];
echo $valid->exec($arr);

$valid = new Validator('email');
echo $valid->exec("abc@gmail.com" );


$valid = new Validator('minlength', 5);
echo $valid->exec("asx");


//$valid = new Validator('test', true, [
//    new Validator('minlength', 1000),
//    new Validator('regexp', '/test/'),
//    new Validator('email')]);
//
