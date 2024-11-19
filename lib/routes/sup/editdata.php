<?php

//include function page 
include_once('../../function/supFunction.php');

//call the class and create an object 
$serObj = new Sup();

$result = $serObj -> editdata($_GET['id'],$_GET['un'],$_GET['ph'],$_GET['em'],$_GET['nic'],$_GET['ti'],$_GET['ty'],$_GET['le']);


echo($result);


?>