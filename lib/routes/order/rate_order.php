<?php

//include function page 
include_once('../../function/orderFunction.php');

//call the class and create an object 
$serObj = new Order();

$result = $serObj -> rateorder($_GET['id'],$_GET['rate'],$_GET['user']);


echo($result);


?>