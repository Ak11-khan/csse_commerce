
<?php

if(isset($_GET['edit_brands'])){
  $edit_brand_id=$_GET['edit_brands'];
$select_br="select * from brands where brand_id=$edit_brand_id ";
$result_br=mysqli_query($con,$select_br);
$row_brand=mysqli_fetch_assoc($result_br);
  $brand_id=$row_brand['brand_id'];   
  $brand_title=$row_brand['brand_title'];
//  echo $brand_title;

//  update categories
if(isset($_POST['update_b'])){
   
  $brand_title=$_POST['brand_title_name'];
   $Update_ca="update brands set brand_title='$brand_title' where brand_id=$edit_brand_id"; 
   $result_query=mysqli_query($con,$Update_ca);
   if($result_query){
    echo "<script>alert('Brand Updated successfully')</script>";
    echo "<script>window.open('./index.php?view_brands','_self')</script>";
   }
}
}

?>

<div class="container"></div>
<h1 class="text-center mb-4">Edit Brands</h1>

<form action="" method="post" class="text-center">
  <div class="form outline mb-4">
  <label for="brand_title"><h4>Brand Title</h4></label>
  <input type="text" name="brand_title_name" id="brand_title" class="form-control w-50 m-auto" value="<?php echo $brand_title; ?>">

  </div>
<input type="submit" value="Update Brand"
class="btn btn-info px-3 mb-3" name="update_b">
</form>
</div>


