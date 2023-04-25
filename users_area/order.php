<!DOCTYPE html>
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id'])){
  // what ever the user id this user is having will be fetch from this table 
    $user_id=$_GET['user_id'];
   
    // getting total items and total price of all items 
   $get_ip_address=getIPAddress();
   $total_price=0;
   $cart_query="select * from cart_details where ip_address='$get_ip_address'";
   $result_cart_query=mysqli_query($con,$cart_query);
   $invoice_number=mt_rand();
  //  echo $invoice_number;
  $status='pending';
  //  display one row product
   $count_products=mysqli_num_rows($result_cart_query);
  //  while loop for multiple products and save in variable $row_price
  // each and every time the while loop is run 
  // same user's all products are going to display
  // using products id match with the products presents in 'projects' table 
   while($row_price=mysqli_fetch_array($result_cart_query)){
     $product_id=$row_price['product_id'];
     $select_product="select * from products where product_id =$product_id";
     $run_price=mysqli_query($con,$select_product);
     while($row_product_price=mysqli_fetch_array($run_price)){
      // price stored in array 50 19:00
       $product_price=array($row_product_price['product_price']);
       $product_price_sum=array_sum($product_price);
       $total_price+=$product_price_sum;
      //  echo $subtotal;
  //  getting quantity from cart
  
  $get_cart="select * from cart_details ";
  $run_cart=mysqli_query($con,$get_cart);
  // fetch particular quantity from cart table
  
  $row_cart=mysqli_fetch_array($run_cart);
  // fetch particular quantity from quantity column
  $p_quantity=$row_cart['quantity'];
  
  if($p_quantity==0){
    $p_quantity=1;
    $subtotal=$total_price;
    
  }else{
    $p_quantity = $p_quantity;
  $subtotal = $total_price * $p_quantity;
  // echo $subtotal;
  }
   $insert_orders="insert into user_orders (user_id,amount_due,invoice_number,total_products,order_date,
   order_status) values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
  $result_que=mysqli_query($con,$insert_orders);
  if($result_que){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
  
     }
  
  
  // orders pending 
  $insert_pending_o="insert into orders_pending (user_id,invoice_number,product_id,quantity,order_status) 
  values ($user_id,$invoice_number,$product_id,$p_quantity,'$status')";
  $result_pending=mysqli_query($con,$insert_pending_o);


  // delete items from cart

  $empty_cart="delete from cart_details where ip_address='$get_ip_address' ";
  $result_empty=mysqli_query($con,$empty_cart);

  } }
}
  ?>
  
  
  
  
  