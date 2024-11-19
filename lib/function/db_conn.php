<?php
//database Connection class
class Connection {

    //creating the private variables
private $server;
private $user;
private $password;
private $database;

//calling the constructor
public function __construct($server,$user,$pwd,$db)
{
    $this->server = $server;
    $this->user = $user;
    $this->password = $pwd;
    $this->database = $db;
}

//creating connecting method and executing sql query
public function Conn(){
    $conn = new mysqli($this->server,$this->user,$this->password,$this->database);

    //ternery oparation
    $result = (!$conn)?null:$conn;
    return($result);
}
}
?>