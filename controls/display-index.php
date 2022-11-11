<?php
include "../config/connection.php";
include "../objects/ClassQuery.php";

$database = new myconnnection();
$db = $database->connect();

$user = new query($db);

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
<script>
//for Delete
$('.remove').on('click', function(e){
    e.preventDefault();

    var id = $(this).val();
   
    var remove = 'id=' + id;
    
   
    $.ajax({
        type: 'POST',
        url: 'controls/deleteUser.php',
        data: remove,

        success: function(response)
        {
            if(response > 0)
            {
                $.ajax({
                    type: 'POST',
                    url:'controls/display-index.php',
                
                    success: function(html)
                    {
                        alert(html);
                        $('#user-body').fadeOut();
                        $('#user-body').fadeIn();
                        $('#user-body').html(html);
                    }
                })
                echo ("sucessfully update");
            }else{
                echo ("failed");
            }
        }
    })
})
</script>