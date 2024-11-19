<?php
// Include the class file
include_once('../../function/empFunction.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empemail = $_POST['empemail'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];

    $userObj = new Employer();
    $result = $userObj->changepwd($empemail, $oldpassword, $newpassword);

    echo ($result);
} 
?>
