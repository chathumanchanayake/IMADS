<?php

//include function page 
include_once('../../function/reorderFunction.php');

//Get product Details 

//call the class and create an object 
$empObj = new Reorder();

$result = $empObj -> addrequest3($_GET['sid'],$_GET['pid']);


echo($result);


?>