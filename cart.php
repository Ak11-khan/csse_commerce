<!-- connect php -->
<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>E_commerce website -Cart Details</title>
    <!-- bootstrap css link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- font awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <style>
    .cart_img{

width: 80px;
height: 80px; 
object-fit: contain;
}

 *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial;
  padding: 10px;
  background: #e7d8c9;
}
.header {
  width: 100%;
  padding: 15px;
  text-align: center;
  background: ccd5ae;
}
.topnav {
    
    padding: 20px 0;
    background-color:#b2967d;
    width: 100%;
    overflow: hidden;
  }
  img ,li {
  float: left;
  overflow: scroll;
}
.header .logo{
    display:flex;
    align-items: center;
}

  .nav_top li a{
    display:inline-block;
    text-decoration: none;
    padding: 10px 12px;
    /* text-align: center; */
  }
  .logo{
  height: 55px;
    width: 55px;
    position: relative;
   
}
.nav_bottom{
  padding: 5px 0;
    background-color:#6c757d;
    width: 98%;
    text-align: center;
    overflow: hidden;
    margin-left: 13px;
}
.logo-text h3{
margin-top: 22px;
text-align: center;
font-size: 30px;
font-weight: 600;
color: #e6beae;
}
.logo-text p{
  text-align: center;
  color: #6c757d;
  margin-bottom: 22px;
}
.row {
      display: flex;
      flex-wrap: wrap;
      margin: -8px;
    }
    .col-md-10 {
      /* margin-right: 5px; */
      width: 78.33%;
      padding: 18px;
      margin: auto;
      
    }
    .col-md-2 {
      width: 16.67%;
      padding: 5px;
      background-color: #eee4e1;
      text-align:center;
      height: 100%;
      margin: auto;
      z-index: 100;
    }
    .col-md-2 li{
      
    
    height: 50px;
    list-style: none;
      }
      .col-md-2 a {
  text-decoration: none;
  padding: 10px 12px;
  color: black;
}

.side_nav1 {
  display: flex;
  flex-direction: column;

}
.side_nav2 {
  display: flex;
  flex-direction: column;
}
.product-card {
  width: 21rem;
  background-color: #eee4e1;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
  border-radius: 0.5rem;
  overflow: hidden;
  width: 100%;
  max-width: 20rem;
}

.product-image {
  height: 12rem;
  overflow: hidden;
}
.product-title {
  margin-bottom: 0.5rem;
  font-size: 1.25rem;
  font-weight: bold;
}

.product-description {
  margin-bottom: 1rem;
}

.product-price {
  margin-bottom: 0.5rem;
  font-size: 1.25rem;
  font-weight: bold;
  
}

.product-price-add-to-cart {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 1rem;
}

.btn {
  margin-top: 0.5rem;
  border-radius: 0.5rem;
  text-transform: uppercase;
  letter-spacing: 0.05rem;
  font-size: 0.875rem;
  font-weight: bold;
  padding: 0.5rem 1rem;
  transition: all 0.3s ease;
  text-decoration: none;

}

.btn-info {
  background-color: #e6beae;
  border-color: #e6beae;
  color: #fff;
 
}

.btn-info:hover {
  background-color: #e6beae;
  border-color: #e6beae;
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.btn-secondary:hover {
  background-color: #5a6268;
  border-color: #545b62;
}
@media screen and (max-width: 768px) {
    .product-card {
    width: 48%;
    }
    .sidebar {
    width: 100%;
    margin-top: 20px;
    }
    .card {
      margin-bottom: 20px;
      width: 100%;
    }
    }
    /* .header {
    max-width: 1300px;
    margin: 0 auto;
  } */



/* .logo {
  margin-right: 20px;
} */

.nav-toggle {
  display: none;
}

.nav-toggle-label {
  position: absolute;
  top: 20px;
  right: 20px;
  display: block;
  width: 40px;
  height: 40px;
  cursor: pointer;
  z-index: 2;
}

.nav-toggle-label span {
    display: block;
    width: 100%;
    height: 2px;
    background-color: #fff;
    position: relative;
    transition: transform 0.3s ease-in-out;
  }

.nav-toggle-label span:before,
.nav-toggle-label span:after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    background-color: #fff;
    position: absolute;
      left: 0;
    transition: transform 0.3s ease-in-out;
}

.nav-toggle-label span:before {
top: -10px;
transition: transform 0.3s ease-in-out;
}

.nav-toggle-label span:after {
bottom: -10px;
transition: transform 0.3s ease-in-out;
}

  .nav-toggle:checked + .nav-toggle-label span:before {
transform: rotate(-45deg);
top: 0;
}

  .nav-toggle:checked + .nav-toggle-label span:after {
transform: rotate(45deg);
bottom: 0;
}

.nav_top {
margin-left: auto;
}

.nav_top .nav-item {
margin-left: 2rem;
}

.nav_top .nav-link {
color: #fff;
text-decoration: none;
padding-left: 15px;
}

.nav_top .nav-link:hover {
color: #fff;
border-bottom: 2px solid #fff;
}

/* .logo {
height: 50px;
margin-right: 1rem;
} */

.form-control {
margin-right: 1rem;
}

.btn-outline-light {
color: #fff;
border-color: #fff;
}

.btn-outline-light:hover {
background-color: #fff;
color: #000;
}

/* Add this to override the default bootstrap styles */
.navbar-collapse {
  justify-content: flex-end;
}


.card-img-top{
  width: 100%;
  height:200px;
  object-fit: contain;
  aspect-ratio: 16/9;
}
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background-color: #b2967d;
    padding: 15px;
} 
@media screen and (max-width: 800px) {
  .col-md-10 , .col-md-2{
      /* margin-right: 5px; */
      width: 100%;
      padding: 18px;
      margin: auto;
      padding: 0;
    }
  
 
}

table, th, td {
  border: 1px solid;
}
table {
  width: 100%;
  margin-bottom: 15px;
}
.center {
  margin-left: auto;
  margin-right: auto;
}
td {
  text-align: center;
}


   </style>
  </head>
  <body>
    <!--navbar -->
 
    <div class="header">
     <nav class="topnav">
      <span>
        <img src="./images/logo.png" alt="" class="logo">
        </span>
     
      <ul class="nav_top">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item(); ?></sup></a>
        </li>
      
        </ul>
          </div>
  </div>
</nav>

<!-- calling cart function  -->
<?php
cart();
?>
<!-- second child -->
<nav class="nav_bottom">	
  <ul class="nav_top">
  <?php
       
       if(!isset($_SESSION['user'])){
        echo "<li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='#'>Welcome Guest</a>
      </li>";
         
    }else{
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='#'>Welcome ".$_SESSION['user']."</a></li>";
          }  


        if(!isset($_SESSION['user'])){
      echo "<li class='nav-item'>
      <a class='nav-link'  href='./users_area/user_login.php'>Login</a>
    </li>";
       
  }else{
          echo "<li class='nav-item'>
          <a class='nav-link'  href='./users_area/logout.php'>Logout</a>
        </li>";
        }  
    ?>
  </ul>
</nav>

<!-- Third child -->
<div class="text logo-text">
  <h3 class="heading1"> Coming Soon </h3>
  <p class="sub_heading"> Welcome to A Store</p>
</div>
<!-- fourth child_table -->
<div class="container">
<div class="row">
  <form action="" method="post">
  <table class="table table-bordered text-center">
    
      <!-- php code to display dynamic data -->
      <?php
       
       $get_ip_address = getIPAddress();
       $total_price=0;
       $cart_query="select * from cart_details where ip_address='$get_ip_address'";
       $result=mysqli_query($con, $cart_query);
       $result_count=mysqli_num_rows($result);
       if($result_count>0){
        echo "<thead>
        <tr>
          <th>Product Title</th>
          <th>Product Image</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Remove</th>
          <th colspan='2'>Operations</th>
  
        </tr>
      </thead>
      <tbody>";

       while($row=mysqli_fetch_array($result)){
         // fetching the product_id using mysqli_fetch_array
         $product_id=$row['product_id'];
         $select_products="select * from products where product_id=$product_id";
         $result_products=mysqli_query($con, $select_products);
         while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price= array($row_product_price['product_price']); //[9,8]array form 
          // fetching price not as an array ,single price from array rows
          $price_table=$row_product_price['product_price'];
          $product_title=$row_product_price['product_title'];
          $product_image1=$row_product_price['product_image1'];

          $product_values= array_sum($product_price); //[17]
          $total_price+=$product_values; //17
   
      // you can concatenate or use double quote and curly brace to enclose entire string
      // echo "<tr>
        // <td>" . $product_title . "</td>
        // <td><img src='./admin/product_images/" . $product_image1 . "' alt='' class='cart_img'></td>
        // <td><input type='text' name='qty' id='' class='form-input w-50' ></td>";

          echo "<tr>
          <td>{$product_title}</td>
          <td><img src='./admin/product_images/{$product_image1}' alt='' class='cart_img'></td>
          <td><input type='text' name='qty' id='' class='form-input w-50'></td>";
  
      $get_ip_address = getIPAddress();
      if(isset($_POST['update_cart'])){
        // whatever value input in a input field stores in $quantity
       $quant=$_POST['qty'];
      
       $update_cart_p="update cart_details set quantity='$quant' where ip_address='$get_ip_address'";
        $result_quantity=mysqli_query($con,$update_cart_p);
       
           $total_price = $total_price * $quant;
       }
  
      echo "<td><p><span>$</span>{$price_table}</p></td>
        <td><input type='checkbox' name='remove[]' value='{$product_id}'></td>
        <td>

          <input type='submit' value='Update Cart' class='bg-info px-2 py-1 mx-2' name='update_cart'>
        
          <input type='submit' value='Remove Cart' class='bg-info px-2 py-1 mx-2' name='remove_cart'>
        </td>
      </tr>";
      }}
       
   
} else{
  echo "<h2 class='text-center text-danger'>cart is empty</h2>";
} 
       
?>
 
    </tbody>
  </table>


  <!-- subtotal -->
  <div class="d-flex mb-3">
    <?php
      
   $get_ip_address = getIPAddress();
   
   $cart_query="select * from cart_details where ip_address='$get_ip_address'";
   $result=mysqli_query($con, $cart_query);
   $result_count=mysqli_num_rows($result);
   if($result_count>0){
    echo "<h4 class='px-2 py-1'>Subtotal: <strong class='text-info'>$$total_price </strong></h4>
    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>
    <button class='p-2 py-2'><a href='./users_area/checkout.php' class='text-dark text-decoration-none'>Check Out</a></button>";
   }
   else{
    echo " <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>";
   }
   if(isset($_POST['continue_shopping'])){
    echo "<script>window.open('index.php','_self')</script>";
   }
    ?>
  
</div>
</div>
</div>
</form>

<!-- function to remove item -->
<?php
function remove_cart_item(){
global $con;
if(isset($_POST['remove_cart'])){
  // remove items using name <input type="checkbox" name="remove[]
  foreach($_POST['remove'] as $remove_id){
  // echo $remove_id;
  $delete_q="Delete from cart_details where product_id='$remove_id'";
  $run_del=mysqli_query($con,$delete_q);
  if($run_del){
    echo "<script>window.open('cart.php','_self')</script>";
  }
  }
}
}
  echo $remove_item=remove_cart_item();


?>
<!-- last child -->
<!-- include footer -->
<?php
include('./includes/footer.php')
?>
    </div>


    <!-- bootstrap js  link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>




