<?php
  include 'config/connection.php';
  include 'objects/ClassQuery.php';
  $database = new myconnnection();
  $db = $database->connect();

  $user = new query($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
   body{
    background-color: #2f3542;
   }
   .container{
    background-color: #ffffff;
   }
</style>
<body>
  <!-- TEST EDIT -->
<div class="container mt-5 mb-3 p-5 rounded-5">
  <div class="jumbotron ">
  <form method="post">
      <div class="row">
          <div class="col-lg-6">
              <div class="mb-3">
                <label  class="form-label">First name</label>
                <input type="text" id="firstname" class="form-control">
              </div>
          </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label  class="form-label">Username</label>
                <input type="text" class="form-control" id="username">
              </div>
            </div>
      </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label  class="form-label">Last name</label>
                <input type="text" id="lastname"class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
        </div>
    </div>
        <button id="submit" onclick="add_data()" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <br>
  <br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="sampleBody" class="modal-body">      
        <!-- User Details goes here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="save-update" type="button" onclick="update_data()"class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
<br>
<br>
<table class="table mb-5">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
      <th>password</th>
      <th>status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="user-body">
    <?php
     $view = $user->Select_data();
     while($row = $view->fetch(PDO:: FETCH_ASSOC))
     {
        echo '
        <tr>
          <th>'.$row['id'].'</th>
          <td>'.$row['firstname'].'</td>
          <td>'.$row['lastname'].'</td>
          <td>'.$row['username'].'</td>
          <td>'.$row['password'].'</td>
          <td>'.$row['status'].'</td>
          <td>
            <button class="btn btn-info btn-sm update" value="'.$row['id'].'">Update</button>
            <button class="btn btn-danger btn-sm remove" value="'.$row['id'].'">Remove</button>
          </td>
        </tr>';
     }
    ?>
  </tbody>
</table>
</div>



<script src="assets/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script> -->
<?php include 'index-js.php'?>


</body>
</html>