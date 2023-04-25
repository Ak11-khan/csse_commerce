<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>
<body>
    <h3 class="text-danger mb-4 ">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <!-- margin auto divide space between left and right -->
            <input type="Submit" class="form-control w-50 m-auto" name="delete" value="Delete account">
        </div>
        <div class="form-outline mb-4">
          <input type="Submit" class="form-control w-50 m-auto" name="ndelete" value="Cancel">
        </div>
    </form>
    <?php
   $user_session=$_SESSION['user'];
   if(isset($_POST['delete'])){
      $delete_query="delete from user_table where username='$user_session'";
      $result_que=mysqli_query($con,$delete_query);
      if($result_que){
        session_destroy();
        echo "<script>alert('Account deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
      }

   }
   if(isset($_POST['ndelete'])){
    echo "<script>window.open('profile.php','_self')</script>";
   }
?>
</body>
</html>
