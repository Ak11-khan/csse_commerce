


<?php
// include('./includes/connect.php');

// getting products
function get_product(){
  global $con;
  // condition to check isset or not
if(!isset($_GET['categories'])){
  if(!isset($_GET['brands'])){

    // selecting by random order with limit 
$select_query="select * from products order by rand() limit 0,5";
$result_query=mysqli_query($con,$select_query);
// for fetching single data) 
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card'>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'><span>$</span></span>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info' id='btn' onclick='showItemAddedMessage()'>Add to Cart</a>

      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>
";
  }
}
}
}

// getting all products for product home button
function get_all_products(){
  global $con;
  // condition to check isset or not
if(!isset($_GET['categories'])){
  if(!isset($_GET['brands'])){

    // selecting by random order with limit 
$select_query="select * from products order by rand()";
$result_query=mysqli_query($con,$select_query);
// for fetching single data) 
// $row=mysqli_fetch_assoc($result_query);
// echo $row['product_title'];

while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card '>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>
";
  }
}
}
}
// getting unique categories to show results using id value
function get_unique_categories(){

  global $con;
  // condition to check isset or not
if(isset($_GET['categories'])){
  $categories_id=$_GET['categories'];
$select_query="select * from products where categories_id=$categories_id";
$result_query=mysqli_query($con,$select_query);
$num_of_row=mysqli_num_rows($result_query);
if($num_of_row==0){
  echo "<h2 class='text-danger'> No stock for this category</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card '>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>
";
  }
}
}

// getting unique brands
function get_unique_brands(){

  global $con;
  // condition to check isset or not
if(isset($_GET['brands'])){
  $brand_id=$_GET['brands'];
$select_query="select * from products where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
$num_of_row=mysqli_num_rows($result_query);
if($num_of_row==0){
  echo "<h2 class='text-center text-danger'> This Brand is not available for service  </h2>";
}

while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card '>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>";
  }
}
}
 // displaying brands in sidenav
function get_brands(){
  global $con;
  $select_brands="select * from brands";
 $result_brands=mysqli_query($con,$select_brands);

//  It is only fetching 1 record from database 
//  $row_data=mysqli_fetch_assoc($result_brands);
//  echo $row_data['brand_title'];

while($row_data=mysqli_fetch_assoc($result_brands)){
// brand title for fetching brands
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_id'];
  echo "<li>
  <a href='index.php?brands=$brand_id'>$brand_title</a>
</li>";
  }
}
// displaying categories in sidenav

function get_category(){
  global $con;
$select_categories="select * from categories";
 $result_categories=mysqli_query($con,$select_categories);

//  It is only fetching 1 record from database 
//  $row_data=mysqli_fetch_assoc($result_categories);
//  echo $row_data['category_title'];

while($row_data=mysqli_fetch_assoc($result_categories)){
// cate title for fetching categories
  $cat_title=$row_data['category_title'];
  $cat_id=$row_data['category_id'];
  echo " <li>
  <a href='index.php?categories=$cat_id'>$cat_title</a>
</li>";
  }
}
// searching product

function search_product(){
  global $con;
  if(isset($_GET['search_data_p'])){
    $search_data_value=$_GET['search_data'];
   $search_query="select * from products where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
$num_of_row=mysqli_num_rows($result_query);
if($num_of_row==0){
  echo "<h2 class='text-center text-danger'> No results match. No products found on this category!  </h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card '>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>";
  }
}}
// view details functions
function view_details(){
  global $con;
  // condition to check isset or not
  if(isset($_GET['product_id'])){
if(!isset($_GET['categories'])){
  if(!isset($_GET['brands'])){
    // getting id from url
   $product_id=$_GET['product_id'];
    // selecting by random order with limit 
$select_query="select * from products where product_id= $product_id";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $product_price=$row['product_price'];
  $categories_id=$row['categories_id'];
  $brand_id=$row['brand_id'];
  echo "<div class='product-card '>
  <div class='product-image'>
    <img src='./admin/product_images/$product_image1' alt='$product_title'>
  </div>
  <div class='product-details'>
    <h5 class='product-title'>$product_title</h5>
    <p class='product-description'>$product_description</p>
    <div class='product-price-add-to-cart'>
      <p class='product-price'>$product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
  </div>
</div>



<div class='col-md-8'>
<!-- related images -->
<div class='row'>
 
<div class='col-md-12'>
  <h4 class='text-center text-info mb-5'>Related Products</h4>
</div>
<div class='col-md-6'>
<img src='./admin/product_images/$product_image2' class='card-img-top img-fit' alt='$product_title'>
</div>
<div class='col-md-6'>
<img src='./admin/product_images/$product_image3' class='card-img-top img-fit' alt='$product_title'>
</div>
</div>
  </div>
   ";
  }
}
}
  }
}

//  get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function for selecting and inserting in cart using ip and id 

function cart(){
if(isset($_GET['add_to_cart'])){
global $con;
$get_ip = getIPAddress();
$get_product_id=$_GET['add_to_cart'];
$select_query="select * from cart_details where ip_address='$get_ip' and product_id=$get_product_id";
$result_query=mysqli_query($con,$select_query);
$num_of_row=mysqli_num_rows($result_query);
if($num_of_row>0){
  echo "<script>alert('This item is already present in cart')</script>";

  echo "<script>window.open('index.php','_self')</script>";
}else{
  $insert_query="insert into cart_details (product_id,ip_address,quantity)
  values ($get_product_id,'$get_ip',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item is added successfully')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
}
}
// function to get cart item numbers

function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress();
     $select_query="select * from cart_details where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_item=mysqli_num_rows($result_query);
    
    }else{
    
      global $con;
      $get_ip = getIPAddress();
      $select="select * from cart_details where ip_address='$get_ip'";
      $result=mysqli_query($con,$select);
      $count_cart_item=mysqli_num_rows($result);
      
    }
    echo $count_cart_item;
    }

    // Total price function

    function total_cart_price(){
      global $con;
      $get_ip_address = getIPAddress();
      $total_price=0;
      $cart_query="select * from cart_details where ip_address='$get_ip_address'";
      $result=mysqli_query($con, $cart_query);
      while($row=mysqli_fetch_array($result)){
        // fetching the product_id using mysqli_fetch_array
        $product_id=$row['product_id'];
        $select_pro="select * from products where product_id='$product_id'";
        $result_products=mysqli_query($con, $select_pro);
        while($row_product_price=mysqli_fetch_array($result_products)){
         $product_price= array($row_product_price['product_price']); //[9,8]
         $product_values= array_sum($product_price); //[17]
         $total_price+=$product_values; //17
    }
  }
  echo $total_price;
}

// get user order details

function get_user_details(){
 global $con;
 $user= $_SESSION['user'];
 $get_details="select * from user_table where username='$user'";
 $result_query=mysqli_query($con,$get_details);
 while($row_order=mysqli_fetch_array($result_query)){
  $user_id=$row_order['user_id'];
  // echo $user_id;

  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_orders'])){
        $get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
        $result_orders=mysqli_query($con,$get_orders);
        // count the number of row in the table
        $row_count=mysqli_num_rows($result_orders);
        if($row_count>0){
          
       echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count </span> pending orders</h3>
       <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";

        }else{
          echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>0</span> pending orders </h3>
          <p class='text-center'><a href='../index.php' class='text-dark'>Order Details</a></p>";
        }
  }
 }
}
 }
}
?>
