<?php
if(isset($_GET['delete_brands'])){
  $b_del_id=$_GET['delete_brands'];
  // echo $b_del_id;





$select_brand_del="delete from brands where brand_id=$b_del_id";
$result_brand_del=mysqli_query($con,$select_brand_del);
if($result_brand_del){
  echo "<script>alert('Brand deleted successfully')</script>";
  echo "<script>window.open('./index.php?view_brands','_self')</script>";
 }
}
?>