<?php
// include function page(userFunction.php)
include_once('../../function/ebookFunction.php');

$userObj = new Ebook();

$result = $userObj->delete($_GET['uid']);

echo($result);

?>