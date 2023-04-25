<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../includes/connect.php');

if(isset($_POST['insert_product'])){

  $product_title=$_POST['product_title'];
  $description=$_POST['description'];
  $product_keywords=$_POST['product_keywords'];
  $product_category=$_POST['product_category'];
  $product_brands=$_POST['product_brands'];
  $product_price=$_POST['product_price'];
  $products_status='true';

  // accessing images
  $product_images1=$_FILES['product_images1']['name'];
  $product_images2=$_FILES['product_images2']['name'];
  $product_images3=$_FILES['product_images3']['name'];

  // accessing image tmp name
  $temp_images1=$_FILES['product_images1']['tmp_name'];
  $temp_images2=$_FILES['product_images2']['tmp_name'];
  $temp_images3=$_FILES['product_images3']['tmp_name'];

  //checking empty condition
  if($product_title=='' or $description=='' or $product_keywords=='' or $product_category==''
  or $product_brands=='' or $product_price=='' or $product_images1=='' or $product_images2==''
  or $product_images3=='' ){
           echo "<script>alert('please fill all the available fields')</script>";
           exit();
}else{
  // @mac admin % sudo chmod -R 777 product_image 
  // for permission granted
  move_uploaded_file($temp_images1,"./product_images/$product_images1");
  move_uploaded_file($temp_images2,"./product_images/$product_images2");
  move_uploaded_file($temp_images3,"./product_images/$product_images3");

  //insert query 
  $insert_products="insert into products(product_title,product_description,
  product_keywords,categories_id,brand_id,product_image1,product_image2,
  product_image3,product_price,date,status) values('$product_title',
  '$description','$product_keywords','$product_category','$product_brands'
  ,'$product_images1','$product_images2','$product_images3',
  '$product_price',NOW(),'$products_status')";
  $r_query=mysqli_query($con,$insert_products);
  if($r_query){
    echo "<script>alert('inserted successfully')</script>";
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Product- Admin Dashboard</title>
  <!-- bootstrap css link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!-- font awesome  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
  

<div class="container mt-3" >
  <h1 class="text-center">Insert Products</h1>

  <!-- form enctype for images  -->
  <form action="" method="POST" enctype="multipart/form-data">
    <!-- title -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_title" class="form-label">Product Title</label>
      <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
    </div>
    <!-- description -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="description" class="form-label">Product Description</label>
      <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
    </div>
    <!-- product keyword -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_keywords" class="form-label">Product Keywords</label>
      <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
    </div>
   <!-- categories -->
   <div class="form-outline mb-4 w-50 m-auto">
      <select name="product_category" id="product_category" class="form-select">
        <option value="">Select a Category</option>
        <?php
            $select_query="select * from categories";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
            $category_title=$row['category_title'];
            $category_id=$row['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
            }
       ?>
               
      </select>
    </div>
    <!-- brands -->
    <div class="form-outline mb-4 w-50 m-auto">
      <select name="product_brands" id="product_brands" class="form-select">
      <option value="">Select a Brands</option>
      <?php
            $select_query="select * from brands ";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
            $brand_title=$row['brand_title'];
            $brand_id=$row['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
            }
       ?>
        
      </select>
    </div>
    <!-- images -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images1" class="form-label">Product Image 1</label>
      <input type="file" name="product_images1" id="product_images1" class="form-control"  required="required">
    </div>
    <!-- image 2 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images2" class="form-label">Product Image 2</label>
      <input type="file" name="product_images2" id="product_images2" class="form-control"  required="required">
    </div>
    <!-- image 3 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_images3" class="form-label">Product Image 3</label>
      <input type="file" name="product_images3" id="product_images3" class="form-control"  required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_price" class="form-label">Product Price</label>
      <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value ="Insert Products">
  </form>

  <!-- 
echo sys_get_temp_dir();
  -->
 
</div>
</body>
</html>