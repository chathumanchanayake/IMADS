<?php

//include function
include_once('../../function/supFunction.php');

$empObj = new Sup();

$result = $empObj -> empSearch($_GET['searchData']);

echo($result);

?>