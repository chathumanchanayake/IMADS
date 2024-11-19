<?php
// include function page(userFunction.php)

include_once('../../function/supFunction.php');

$userObj = new Sup();

$result = $userObj->delete_emp($_GET['uid']);

echo($result);

?>