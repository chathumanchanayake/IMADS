<?php

//include function
include_once('../../function/orderFunction.php');

$proObj = new Order();

$result = $proObj -> deliverlist2($_GET['searchData']);

echo($result);

?>