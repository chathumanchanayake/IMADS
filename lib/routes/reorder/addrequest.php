<?php

//include function page 
include_once('../../function/reorderFunction.php');

//Get product Details 

//call the class and create an object 
$empObj = new Reorder();

$result = $empObj -> addrequest($_GET['sid'],$_GET['pid'],$_GET['qty']);


echo($result);


?>