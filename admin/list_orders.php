<h3 class="text-center text-success">All Orders</h3>
<table class="center">

<thead class="bg-info">
  <?php
$get_orders="select * from user_orders ";
$get_result=mysqli_query($con,$get_orders);
$result_r=mysqli_num_rows($get_result);
echo "<tr>
<th>Ser No</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Total Products</th>
<th>Order Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-center text-light'>";


if($result_r==0){
echo "<h2 class=text-center text-danger mt-5 >No Orders</h2>";
}else{
$num=0;
  while($get_row=mysqli_fetch_assoc($get_result)){
    $order_id=$get_row['order_id'];
    $user_id=$get_row['user_id'];
    $amount_due=$get_row['amount_due'];
    $invoice_number=$get_row['invoice_number'];
    $total_products=$get_row['total_products'];
    $order_date=$get_row['order_date'];
    $order_status=$get_row['order_status'];
   
  $num++;

  echo "<tr>
  <td> $num </td>
  <td> <span>$</span>$amount_due </td>
  <td> $invoice_number </td>
  <td> $total_products </td>
  <td> $order_date </td>
  <td> $order_status </td>
  <td><a href='index.php?delete_order=$order_id' class='text-light'>
<i class='fa-solid fa-trash'></i></a></td>
 </tr>";
}
}


?>

  
</tbody>
</table>