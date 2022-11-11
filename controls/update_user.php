<?php
include '../config/connection.php';
include '../objects/ClassQuery.php';

$database = new myconnnection();
$db = $database->connect();

$update = new query($db);

$update->id = $_POST['id'];
$update->firstname = $_POST['fname'];
$update->lastname = $_POST['lname'];
$update->username = $_POST['uname'];
$update->password = $_POST['upass'];

$upd = $update->Update_data();


if($upd)
{
    echo 1;
}else{
    echo 0;
}

?>