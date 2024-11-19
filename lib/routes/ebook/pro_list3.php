<?php

//include function page 
include_once('../../function/ebookFunction.php');

//call the class and create an object 
$userObj = new Ebook();

$result = $userObj -> proList3();

echo($result);


?>