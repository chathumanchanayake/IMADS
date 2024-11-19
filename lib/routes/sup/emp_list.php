<?php

//include function page 
include_once('../../function/supFunction.php');

//call the class and create an object 
$userObj = new Sup();

$result = $userObj -> empList();

echo($result);


?>