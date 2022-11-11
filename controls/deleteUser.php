<?php 
include '../config/connection.php';
include '../objects/ClassQuery.php';

$database = new myconnnection();
$db = $database->connect();

$delete = new query($db);

$delete->id = $_POST['id'];


$dlt = $delete->delete_User();


if($dlt)
{
    echo 1;
}else{
    echo 0;
}


?>