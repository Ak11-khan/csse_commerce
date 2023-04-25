
<?php

if(isset($_GET['edit_category'])){
  $edit_cat_id=$_GET['edit_category'];
$select_c="select * from categories where category_id=$edit_cat_id ";
$result_c=mysqli_query($con,$select_c);
$row_cat=mysqli_fetch_assoc($result_c);
  $category_id=$row_cat['category_id'];   
  $category_title=$row_cat['category_title'];
//  echo $category_title;

//  update categories
if(isset($_POST['update_c'])){
   
  $cat_title=$_POST['category_title_name'];
   $Update_ca="update categories set category_title='$cat_title' where category_id=$edit_cat_id"; 
   $result_query=mysqli_query($con,$Update_ca);
   if($result_query){
    echo "<script>alert('Category Updated successfully')</script>";
    echo "<script>window.open('./index.php?view_categories','_self')</script>";
   }
}

}
?>

<div class="container"></div>
<h1 class="text-center mb-4">Edit Category</h1>

<form action="" method="post" class="text-center">
  <div class="form outline mb-4">
  <label for="category_title"><h4>Category Title</h4></label>
  <input type="text" name="category_title_name" id="category_title" class="form-control w-50 m-auto" value="<?php echo $category_title; ?>">

  </div>
<input type="submit" value="Update Category"
class="btn btn-info px-3 mb-3" name="update_c">
</form>
</div>


