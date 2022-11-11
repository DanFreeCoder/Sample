<?php
include '../config/connection.php';
include '../objects/ClassQuery.php';

$database = new myconnnection();
$db = $database->connect();

$user = new query($db);

$user->id = $_POST['id'];
$get = $user->get_user();

while($row = $get->fetch(PDO:: FETCH_ASSOC))
{
    echo '
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                <label  class="form-label">First name</label>
                <input type="text" id="upd-id" class="form-control" value="'.$row['id'].'" hidden>
                <input type="text" id="upd-firstname" class="form-control" value="'.$row['firstname'].'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label  class="form-label">Username</label>
                <input type="text" class="form-control" id="upd-username" value="'.$row['username'].'">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                <label  class="form-label">Last name</label>
                <input type="text" id="upd-lastname" class="form-control" value="'.$row['lastname'].'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="text" class="form-control" id="upd-password" value="'.$row['password'].'">
                </div>
            </div>
        </div>';
}


?>