<h3 class="text-center text-success">All Payments</h3>
<table class="center">

<thead class="bg-info">
  <?php
$get_payments="select * from user_payments ";
$pay_result=mysqli_query($con,$get_payments);
$result_pay=mysqli_num_rows($pay_result);
echo "<tr>
<th>Ser No</th>
<th>Invoice Number</th>
<th>Due Amount</th>
<th>Payment mode</th>
<th>Order Date</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='bg-secondary text-center text-light'>";


if($result_pay==0){
echo "<h2 class=text-center text-danger mt-5 >No Payments received yet</h2>";
}else{
$num1=0;
  while($get_row_p=mysqli_fetch_assoc($pay_result)){
    $order_id=$get_row_p['order_id'];
    // $payment_id =$get_row_p['payment_id '];
    $amount=$get_row_p['amount'];
    $invoice_number=$get_row_p['invoice_number'];
    $payment_mode=$get_row_p['payment_mode'];
    $pay_date=$get_row_p['date'];
  
   
  $num1++;

  echo "<tr>
  <td> $num1 </td>
  <td> $invoice_number </td>
  <td> <span>$</span>$amount </td>
  <td> $payment_mode </td>
  <td> $pay_date </td>
    <td><a href='' class='text-light'>
<i class='fa-solid fa-trash'></i></a></td>
 </tr>";
}
}


?>

  
</tbody>
</table>