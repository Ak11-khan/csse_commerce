<?php
if(isset($_GET['delete_category'])){
  $get_del_id=$_GET['delete_category'];
  echo $get_del_id;





$select_category_del="delete from categories where category_id=$get_del_id";
$result_category_del=mysqli_query($con,$select_category_del);
if($result_category_del){
  echo "<script>alert('Category Deleted successfully')</script>";
  echo "<script>window.open('./index.php?view_categories','_self')</script>";
 }
}
?>