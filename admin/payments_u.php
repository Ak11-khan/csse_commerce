<?php

if(isset($_GET['payments'])){
    $get_id=$_GET['payments'];

    $select_payment="select * from products ";
    $result_query=mysqli_query($con,$select_payment);
    
    $row=mysqli_fetch_assoc($result_query);

    $product_title=$row['product_title'];
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
    value="" class="form-control" required>
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_kw" class="form-label">Product Keywords</label>
    <input type="text" id="product_kw" name="product_kw"
    value="" class="form-control" required>
  </div>


  <div class="text-center py-2 mb-3">
  <input type="submit" name="edit_pro" value="Update Product" class="btn btn-info px-3 mb-3">
</div>



</body>
