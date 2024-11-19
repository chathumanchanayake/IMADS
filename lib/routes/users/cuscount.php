<?php

//include function page 
include_once('../../function/userFunction.php');

//call the class and create an object 
$cusObj = new User();

$result = $cusObj -> cus_count();

echo($result);


?>