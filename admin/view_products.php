<h3 class="text_center text_success">All Products</h3>
<table class="center">

 <thead class="bg-info">
 
  <tr>
    <th>Product Id</th>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <th>Total Sold</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
 </thead>
<tbody class="bg-secondary text-light">
<?php
$get_products="select * from products";
$result_query=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result_query)){
  // fetching from database values
     $product_id=$row['product_id'];
     $product_title=$row['product_title'];
    //  for fetching no image [name] or [temp]
     $product_image1=$row['product_image1'];
    //  $product_image2=$row['product_image2'];
    //  $product_image3=$row['product_image3'];
     $product_price=$row['product_price'];
     $status=$row['status'];
   $number++;
   ?>
   
      <tbody class='bg-secondary text-light'>
      <tr class='text-center'>
      <td><?php echo $number; ?></td>
      <td><?php echo $product_title ?></td>
      <td><img src='./product_images/<?php echo $product_image1; ?>' class='my-1 image_pro' alt=''></td>
      <td><span>$</span><?php echo $product_price; ?></td>
      <td>
        <?php
       $get_total="select * from orders_pending where product_id=$product_id";
       $result=mysqli_query($con,$get_total);
       $row=mysqli_num_rows($result);
               echo $row;
      
        ?>
      </td>
      <td><?php echo $status; ?></td>
      <!-- using id $product_id we already fetch from database access data
       from data base and display in form  edit_products is get variable 
      http://localhost/E-website/admin/index.php?edit_products=1-->
      <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'>
      <i class='fa-solid fa-pen-to-square'></i></a></td>
      <td><a href='index.php?del_product=<?php echo $product_id; ?>' class='text-light'>
      <i class='fa-solid fa-trash'></i></a></td>
    </tr>
    </tbody>
    
  <?php  
}


?>
</tbody>

</table>


