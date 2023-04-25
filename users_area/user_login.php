<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@ session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User- Login</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <!-- my for top bottom margin no right and left -->
  <h2 class="text-center my-5">
   User Login
  </h2>
  <div class="row d-flex align-items-center justify-content-center mt-5">
    <div class="col-lg-12 col-xl-6">
  <form action="" method="post" >
  <div class="form-outline mb-4">
    <!-- username -->
    
  <label for="user_n" class="form-label">Username</label>
  <input type="text" id="user_n" name="user_n" class="form-control" placeholder="Enter your username" required="required" autocomplete="off">
  </div>

  
  <!-- password -->
  <div class="form-outline mb-4">
  <label for="user_pass" class="form-label">Password</label>
  <input type="password" id="user_pass" name="user_pass" class="form-control" placeholder="Enter your password" required="required" autocomplete="off">
  </div>

   <!-- submit-->
   <div class="mt-4 pt-2">
  <input type="submit" name="user_login" class="btn btn-info mb-3 px-3" value ="Login">
  <p class="small fw-bold mt-2 pt-1" >Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a></p>
   </div>
  </form>
  </div>
  </div>
  </div>

</body>
</html>


<?php
// using post method we are going to access data using value 'user_login'
if(isset($_POST['user_login'])){
  // what value we put in input field save in this variable $user_name
   $username=$_POST['user_n'];
   $user_pass=$_POST['user_pass'];
     // check if username is already in database  
   $select_query="select * from user_table where username='$username'";
   $result=mysqli_query($con,$select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);
   $user_ip=getIPAddress();
 
  //  cart items// password_verify built in func in php bc we have hash password
    // take two parameter (variable that saves input data $user_pass)
    // $row_data=mysqli_fetch_assoc($result);
    // column name in db['user_password']
    // mysqli_fetch_assoc() function returns an associative
    //  array which contains the current row of the result object
    // checking if both the if condition is true then display otherwise move to else 
  $select_item="select * from cart_details where ip_address='$user_ip'";
 $result_item=mysqli_query($con,$select_item);
 $row_items=mysqli_num_rows($result_item);
    
      // get result 
      if($row_count>0){
          $_SESSION['user']=$username;
         if(password_verify($user_pass,$row_data['user_password'])){
          // echo "<script>alert('Login successful')</script>";
          if($row_count==1 and $row_items==0){
            // activate session
            $_SESSION['user']=$username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
          
          }else{
            // get output 
            $_SESSION['user']=$username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
          }
        }else{
          echo "<script>alert('Invalid credentials')</script>";
         }        
        }else{
    echo "<script>alert('Invalid credentials')</script>";
   }
}
?>