<?php

//include function page 
include_once('../../function/supFunction.php');

//Get product Details 

//call the class and create an object 
$empObj = new Sup();

$result = $empObj -> addEmployer($_POST['Name'],$_POST['br'],$_POST['empAddress'],$_POST['Phone'],$_POST['Email'],$_POST['Type'],$_POST['service']);


echo($result);


?>