<?php

if(isset($_GET['del_product'])){
  // delete data and data is store inside thi variable 'del_product'
  // <td><a href='index.php?del_product=<?php echo $product_id; 
  // we created in view.products.php
$delete_id=$_GET['del_product'];

// echo $delete_id;

$delete_query="delete from products where product_id=$delete_id";
$result_query=mysqli_query($con,$delete_query);

if($result_query){
  echo "<script>alert('Product Deleted successfully')</script>";
  echo "<script>window.open('./index.php','_self')</script>";
}

}

?>