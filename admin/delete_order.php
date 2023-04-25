<?php
if(isset($_GET['delete_order'])){
  $get_or_id=$_GET['delete_order'];
  echo $get_or_id;





$select_o_del="delete from user_orders where order_id=$get_or_id";
$result_o_del=mysqli_query($con,$select_o_del);
if($result_o_del){
  echo "<script>alert('Order Deleted successfully')</script>";
  echo "<script>window.open('./index.php?list_orders','_self')</script>";
 }
}
?>