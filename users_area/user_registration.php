<?php
include('../includes/connect.php');
include('../functions/common_functions.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User- registration</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <!-- my for top bottom margin no right and left -->
  <h2 class="text-center my-3">
    New User Registration
  </h2>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
  <form action="" method="post" class="" enctype="multipart/form-data">
  <div class="form-outline mb-4">
    <!-- username -->
    
  <label for="user" class="form-label">Username</label>
  <input type="text" id="user" name="user" class="form-control" placeholder="Enter your username" required="required" autocomplete="off">
  </div>
<!-- email -->
<div class="form-outline mb-4">
  <label for="user_email" class="form-label">Email</label>
  <input type="email" id="user_email" name="user_email"  class="form-control" placeholder="Enter your e-mail" required="required">
  </div>
  <!-- image -->
  <div class="form-outline mb-4">
  <label for="user_img" class="form-label">User Image</label>
  <input type="file" id="user_img" name="user_img" class="form-control"  required="required">
  </div>
  <!-- password -->
  <div class="form-outline mb-4">
  <label for="user_pass" class="form-label">Password</label>
  <input type="password" id="user_pass" name="user_pass" class="form-control" placeholder="Enter your password" required="required" autocomplete="off">
  </div>
<!-- con-password -->
<div class="form-outline mb-4">
  <label for="con_pass" class="form-label">Confirm Password</label>
  <input type="password" id="con_pass" name="con_pass" class="form-control" placeholder="Enter your password" required="required" autocomplete="off">
  </div>

  <!-- address -->
<div class="form-outline mb-4">
  <label for="user_add" class="form-label"><Address>Address</Address></label>
  <input type="text" id="user_add" name="user_add" class="form-control" placeholder="Enter your Address" required="required" autocomplete="off">
  </div>

   <!-- contact -->
<div class="form-outline mb-4">
  <label for="user_contact" class="form-label">Contact</label>
  <input type="text" id="user_contact" name="user_contact" class="form-control" placeholder="Enter your Mobile Number" required="required" autocomplete="off">
  </div>
   <!-- submit-->
   <div class="mt-4 pt-2">
  <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" value ="Register">
  <p class="small fw-bold mt-2 pt-1" >Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
   </div>
  </form>
  </div>
  </div>
  </div>

</body>
</html>



<!-- php code -->

<?php

if(isset($_POST['user_register'])){
  // storing values create variable and using post store value getting
  // from html form using its name value like:
    // <input type="text" name="user" 
    // name="user" when using post
  $username=$_POST['user'];
  $user_email=$_POST['user_email'];
  $user_pass=$_POST['user_pass'];
  // values present inside input field ['con_pass'] used for insert and select 
  $con_pass=$_POST['con_pass'];
  // hash password $variable=password_hash($password_variable,PASSWORD_DEFAULT);
  // instead of user_pass you can use hash_password for database
  $hash_password=password_hash($user_pass,PASSWORD_DEFAULT);
  $user_add=$_POST['user_add'];
  $user_contact=$_POST['user_contact'];
  // for image we have to give name and temp_name bc of size,extension, temp location
  $user_img=$_FILES['user_img']['name'];
  $user_img_temp=$_FILES['user_img']['tmp_name'];
  $user_ip=getIPAddress();

  //select table for checking no double input in database
  
  

  // insert into table column name = variable name having input value
$select_query="select * from user_table where username='$username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
// using mysqli_num_rows  we can count the number of rows present inside the database
// if you have 2 records your output will be 2
$row_count=mysqli_num_rows($result);
if($row_count>0){
  echo "<script>alert('Username and email already exist')</script>";
}elseif( $user_pass!=$con_pass){
  echo "<script>alert('passwords does not match')</script>";

}
else{

  // fist parameter of move_upload id temp name of image
  // then make a folder in user_area same folder in user_registration
  // now write ,'./user_images/now use the image variable name where user download its image
  move_uploaded_file($user_img_temp,"./user_images/$user_img");

  //  first column name then variable name which save the value of input field
  $insert_query="insert into user_table (username, user_email,user_password,user_image,
  user_ip,user_address,user_mobile) values ('$username','$user_email','$hash_password','$user_img','$user_ip','$user_add','$user_contact')";
  $sql_execute=mysqli_query($con,$insert_query);
}
 

// selecting cart items ip address is matching with cart table 
// then we are getting this rows 
$select_cart_items="select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
// whatever data we got using select is save inside variable $row_count_cart
$row_count_cart=mysqli_num_rows($result_cart);
if($row_count_cart>0){
  $_SESSION['user']=$username;
  echo "<script>alert('you have items in your cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  echo "<script>window.open('../index.php','_self')</script>";
}
}
  
?>