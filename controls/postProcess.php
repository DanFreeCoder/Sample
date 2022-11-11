<?php

include "../config/connection.php";         
include "../objects/ClassQuery.php";

$database = new myconnnection();
$db = $database->connect();

$inclass = new query($db);


$inclass->firstname = $_POST['fname'];
$inclass->lastname = $_POST['lname'];
$inclass->username = $_POST['uname'];
$inclass->password = md5($_POST['upass']);
$inclass->status = 1;


$execute = $inclass->Save_data();

if($execute)
{
    echo 1;
}else{
    echo 0;
}






?>