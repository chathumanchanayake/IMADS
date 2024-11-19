<?php

//include function page 
include_once('../../function/supFunction.php');

//call the class and create an object 
$serObj = new Sup();

$result = $serObj -> userdata($_GET['uid']);


echo($result);


?>