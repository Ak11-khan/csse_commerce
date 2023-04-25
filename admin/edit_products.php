<!-- two buttons edit and update forst see what edit button action is perform -->
<?php
if(isset($_GET['edit_products'])){
  // edit id from url you can get and store ,fetch data from url
  $edit_product_id=$_GET['edit_products'];
 
$get_product="select * from products where product_id=$edit_product_id";
$result_query=mysqli_query($con,$get_product);
// we already fetch data from table in view_products 
// edit is for particular id so only fetch one time
 $row_q=mysqli_fetch_assoc($result_query);
$product_title=$row_q['product_title'];
$product_description=$row_q['product_description'];
$product_keywords=$row_q['product_keywords'];
$categories_id=$row_q['categories_id'];
$brand_id=$row_q['brand_id'];
$product_image1=$row_q['product_image1'];
$product_image2=$row_q['product_image2'];
$product_image3=$row_q['product_image3'];
$product_price=$row_q['product_price'];
//  echo $product_description;


// fetching category id

            $select_query="select * from categories where category_id=$categories_id";
            $result_query=mysqli_query($con,$select_query);
            $row=mysqli_fetch_assoc($result_query);
            $category_title=$row['category_title'];
            // echo $category_title ;
           

            $select_brand="select * from brands where brand_id=$brand_id";
            $result_b=mysqli_query($con,$select_brand);
            $row_b=mysqli_fetch_assoc($result_b);
            $brand_title=$row_b['brand_title'];
            // echo $brand_title;
  
 
       

}
?>

<body>
<div class="container mt-3">
 <h2 class="text-center ">Edit Product</h2>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_title" class="form-label">Product Title</label>
  <!-- id for label name for php -->
  <input type="text" id="product_title" name="product_title"
  value="<?php echo $product_title; ?>" class="form-control" required>
</div>

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_decs" class="form-label">Product Description</label>
  <input type="textarea" id="product_decs" name="product_decs" 
  value="<?php echo $product_description; ?>" class="form-control" required>
</div>

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_kw" class="form-label">Product Keywords</label>
  <input type="text" id="product_kw" name="product_kw" 
  value="<?php echo $product_keywords; ?>" class="form-control" required>
</div>

<div class="form-outline w-50 m-auto mb-4">
<label for="product_c" class="form-label">Product Categories</label>
<select class="form-select" id="product_c" name="product_category">
  <option value="<?php echo $category_title; ?>"><?php echo $category_title;  ?></option>
  <?php
            $select_cat_all="select * from categories";
            $result_query2=mysqli_query($con,$select_cat_all);
            while($row2=mysqli_fetch_assoc($result_query2)){
            $category_title=$row2['category_title'];
            $categories_id=$row_q['categories_id'];
            echo "<option value='$categories_id'>$category_title </option>";
            }
       ?>
</select>
</div>

<div class="form-outline w-50 m-auto mb-4">
<label for="product_b" class="form-label">Product Brands</label>
<select class="form-select" id="product_b" name="product_brands">
<option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
<?php  
// fetching from different table 
// brand_id is column name of brands table
// $brand_id if variable that store the id fetch from products table
$select_brand="select * from brands ";
$result_b=mysqli_query($con,$select_brand);
 while($row_b=mysqli_fetch_assoc($result_b)){
  $brand_title=$row_b['brand_title'];
  $brand_id=$row_q['brand_id'];
  echo "<option value='$brand_id'>$brand_title </option>";
  
 }

?>
</select>
</div>

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_img1" class="form-label">Product Image1</label>
  <div class="d-flex">
  <input type="file" id="product_img1" name="product_img1" 
  class="form-control w-90 m-auto" required>
  <img src="./product_images/<?php echo $product_image1; ?>" alt="" class=img1>
  </div>
</div>

<div class="form-outline w-50 m-auto mb-4">
  <label for="product_img2" class="form-label">Product Image2</label>
  <div class="d-flex">
  <input type="file" id="product_img2" name="product_img2" 
  class="form-control w-90 m-auto" required>
  <img src="./product_images/<?php echo $product_image2; ?>" alt="" class=img1>
  </div>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
  <label for="product_img3" class="form-label">Product Image3</label>
  <div class="d-flex">
  <input type="file" id="product_img3" name="product_img3" class="form-control w-90 m-auto" required>
  <img src="./product_images/<?php echo $product_image3; ?>" alt="" class=img1>
  </div>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
  <label for="product_p" class="form-label">Product Price</label>
  <input type="text" id="product_p" name="product_p" 
  value="<?php echo $product_price; ?>" class="form-control" required>
</div>

<div class="text-center py-2 mb-3">
  <input type="submit" name="edit_pro" value="Update Product" class="btn btn-info px-3 mb-3">
</div>

<br>
<br>
<br>
<br>


</form>
</div>

</body>
<!-- editing products -->

<?php
if(isset($_POST['edit_pro'])){
    //  storing input data for each field in separate variable
    $product_title=$_POST['product_title'];
    $product_decs=$_POST['product_decs'];
    $product_kw=$_POST['product_kw'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_p=$_POST['product_p'];

  
    $product_img1=$_FILES['product_img1']['name'];
    $img_temp1=$_FILES['product_img1']['tmp'];

    $product_img2=$_FILES['product_img2']['name'];
    $img_temp2=$_FILES['product_img2']['tmp'];

    $product_img3=$_FILES['product_img3']['name'];
    $img_temp3=$_FILES['product_img3']['tmp'];
   

    // checking for field empty or not
    if($product_title=='' or $product_decs=='' or $product_kw=='' or $product_category=='' or $product_brands=='' or
    $product_img1=='' or $product_img2=='' or $product_img3=='' or
    $product_p=='' ){
      echo "<script>alert('Please fill all Empty Fields')</script>";
    }else{
      move_uploaded_file($img_temp1,"./product_images/$product_img1");
      move_uploaded_file($img_temp2,"./product_images/$product_img2");
      move_uploaded_file($img_temp3,"./product_images/$product_img3");
      

    }
  
   $update_edit_p="update products set product_title='$product_title',product_description='$product_decs',
   product_keywords='$product_kw',categories_id='$product_category',
   brand_id='$product_brands',product_image1='$product_img1', product_image2='$product_img2',product_image3='$product_img3',
   product_price='$product_p',date=NOW() where product_id=$edit_product_id" ;
   $result_update_p=mysqli_query($con,$update_edit_p);
   if($result_update_p){
    echo "<script>alert('Product Updated successfully')</script>";
    echo "<script>window.open('./insert_products.php','_self')</script>";
   }
}


?>