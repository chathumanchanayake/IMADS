<?php
//we need to start the sessions 
session_start();


//include main.php
include_once('main.php');

//include auto number module 
include_once('auto_id.php');

class Password extends Main{

    //lets create the employer Registration method
    
    public function addPassword($empId,$oldPwd,$newPwd){
    
        //generate new id for a employer 
        $autoNumber = new AutoNumber;
        $Id = $autoNumber -> NumberGeneration("Id","password_tbl","PWD");

        //insert data to emplyer table
        $sqlInsert = "INSERT INTO employer_tbl VALUES('$empId,$oldPwd,$newPwd);";
    
        //lets check the errors 
        if($this->dbResult->error){
            echo($this->dbResult->error);
            exit;
        }
    
        
    }}