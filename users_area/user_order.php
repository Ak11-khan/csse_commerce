<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
</head>
<body>
    <?php
    $get_name=$_SESSION['user'];
    // things to remember name string ''
    $get_users="select * from user_table where username='$get_name'";
    $result_query=mysqli_query($con,$get_users);
    $row_fetch_usr=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch_usr['user_id'];
//   echo $user_id;
    ?>
<h3 class="text-center text-success mb-4">All my orders</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-info">
    <tr>
        <th>S#</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">

        <?php
       
         $get_user_order="select * from user_orders where user_id='$user_id'";
         $result_orders=mysqli_query($con,$get_user_order);
         $numb=1;
            while($row_user_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_user_orders['order_id'];
            $amount_due=$row_user_orders['amount_due'];
            $total_products=$row_user_orders['total_products'];
            $invoice_number=$row_user_orders['invoice_number'];
            $order_status=$row_user_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete'; 
            }else{
                $order_status='Complete'; 
            }
            $order_date=$row_user_orders['order_date'];
            
            echo "<tr>
            <td>$numb</td>
            <td><span>$</span></span>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td> $order_date</td>"
            ;
       ?>


<?php
 echo "<td>$order_status</td>";
if($order_status=='Complete'){
    echo "<td>Paid</td>";
    echo  $order_status;
}else{
    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>  
    </tr>";
}
      $numb++;
}      
        ?>

     
        
    </tbody>


</table>
</body>
</html>