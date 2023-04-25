


<h3 class="text-center text-success">All Categories</h3>
<table class="center">

<thead class="bg-info text-center">
  <tr>
    <th>Ser #</th>
    <th>Category Title</th>
    <th>Edit</th>
    <th>Delete</th>
     </tr>
</thead>
<tbody class="bg-secondary text-light text-center">
  <?php
$select_view="select * from categories";
$result_view=mysqli_query($con,$select_view);
// for serial number assign number=0
$number=0;
while($row_view=mysqli_fetch_assoc($result_view)){

  $category_title=$row_view['category_title'];
  $category_id=$row_view['category_id'];
  $number++;

?>
<tr>
 <td><?php echo $number; ?></td>
 <td><?php echo $category_title ?></td>
 <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'>
<i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'>
<i class='fa-solid fa-trash'></i></a></td>


</tr>
<!-- for including all number and all in php  -->
<?php
}
?>

</tbody>
</table>