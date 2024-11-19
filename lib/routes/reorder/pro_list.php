<?php

//include function page 
include_once('../../function/reorderFunction.php');

//call the class and create an object 
$userObj = new Reorder();

$result = $userObj -> proList();

echo($result);


?>