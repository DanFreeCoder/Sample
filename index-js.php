<script>
//get the user details from db
$('.update').on('click', function(e){
    e.preventDefault();

    var id = $(this).val();

    $.ajax({
        type: 'POST',
        url: 'controls/get_user_detail_byID.php',
        data: {id: id},

        success: function(html)
        {
            $('#exampleModal').modal('show');
            $('#sampleBody').html(html);
        }
    })
})


//save data to db
 function add_data()
 {
    //UI id to variable
    var fname = $("#firstname").val();
    var lname = $("#lastname").val();
    var uname = $("#username").val();
    var upass = $("#password").val();

    var convertToDB = 'fname=' + fname + '&lname=' + lname + '&uname=' + uname + '&upass=' + upass;
    $.ajax({
        type: 'POST',
        url: 'controls/postProcess.php',
        data: convertToDB,

        success: function(response)
        {
            if(response > 0)
            {
                //1. add ajax -> url to controller
                //2. create controller -> copy index table
                //3. display in index
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
                echo ("sucess");

            }else{
                echo ("failed");
            }
        }
    })
}

//for update

function update_data()
{
    var id = $("#upd-id").val();
    var fname = $("#upd-firstname").val();
    var lname = $("#upd-lastname").val();
    var uname = $("#upd-username").val();
    var upass = $("#upd-password").val();

    var update = 'id=' + id + '&fname=' + fname + '&lname=' + lname + '&uname=' + uname + '&upass=' + upass;

    $.ajax({
        type: 'POST',
        url: 'controls/update_user.php',
        data: update,

        success: function(response)
        {
            if(response > 0)
            {
                echo ("sucessfully update");
            }else{
                echo ("failed");
            }
        }
    })
}

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