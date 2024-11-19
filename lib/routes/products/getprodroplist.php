<?php

//include function page 
include_once('../../function/productFunction.php');

//call the class and create an object 
$serObj = new Product();

$result = $serObj ->  getprodroplist($_GET['cat']);

echo($result);


?>