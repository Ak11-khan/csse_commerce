

</style>
<h3 class="text-center text-success">All users</h3>
<table class="center">

<thead class="bg-info">
  <?php
$get_user="select * from user_table  ";
$user_result=mysqli_query($con,$get_user);
$result_us=mysqli_num_rows($user_result);
echo "<tr>
<th>Ser No</th>
<th>Username</th>
<th>User Email</th>
<th>User Image</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-center text-light'>";


if($result_us==0){
echo "<h2 class=text-center text-danger mt-5 >No Users On Record</h2>";
}else{
$num2=0;
  while($get_row_u=mysqli_fetch_assoc($user_result)){
    // $user_id =$get_row_u['user_id '];
    $username =$get_row_u['username'];
    $user_email=$get_row_u['user_email'];
    $user_images=$get_row_u['user_image'];
    $user_address=$get_row_u['user_address'];
    $user_mobile=$get_row_u['user_mobile'];
  
   
  $num2++;

  echo "<tr>
  <td> $num2 </td>
  <td> $username </td>
  <td> $user_email </td>
  <td> <img src='../users_area/user_images/$user_images' class='my-1 image_peo' alt=''></td> </td>
  <td> $user_address </td>
  <td> $user_mobile </td>
    <td><a href='' class='text-light'>
<i class='fa-solid fa-trash'></i></a></td>
 </tr>";
}
}


?>

  
</tbody>
</table>