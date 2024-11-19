<?php

//include function
include_once('../../function/reorderFunction.php');

$empObj = new Reorder();

$result = $empObj -> proSearch($_GET['searchData']);

echo($result);

?>