


<h3 class="text-center text-success">All Brands</h3>
<table class="center">

<thead class="bg-info text-center">
  <tr>
    <th>Ser #</th>
    <th>Brand Title</th>
    <th>Edit</th>
    <th>Delete</th>
     </tr>
</thead>
<tbody class="bg-secondary text-light text-center">
  <?php
$select_view="select * from brands";
$result_view=mysqli_query($con,$select_view);
// for serial number assign number=0
$number=0;
while($row_view_b=mysqli_fetch_assoc($result_view)){

  $brand_title=$row_view_b['brand_title'];
  $brand_id =$row_view_b['brand_id'];
  $number++;

?>
<tr>
 <td><?php echo $number; ?></td>
 <td><?php echo $brand_title ?></td>
 <td><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-light'>
<i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_brands=<?php echo $brand_id ?>' class='text-light'>
<i class='fa-solid fa-trash'></i></a></td>

</tr>
<!-- for including all number and all in php  -->
<?php
}
?>

</tbody>
</table>
