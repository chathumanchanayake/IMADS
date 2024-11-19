<?php

//include function page 
include_once('../../function/ebookFunction.php');

//Get product Details 

$productImageName = $_FILES['productImg']['name'];
$productImageSize = $_FILES['productImg']['size'];
$productImageType = $_FILES['productImg']['type'];
$productImageLocation = $_FILES['productImg']['tmp_name'];

//call the class and create an object 
$prdObj = new Ebook();

$result = $prdObj -> addebook($_POST['name'],$_POST['id'],$productImageName,$productImageSize,$productImageType,$productImageLocation);


echo($result);


?>