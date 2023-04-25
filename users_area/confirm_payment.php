<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
$order_id=$_GET['order_id'];
$select_data="select * from user_orders where order_id=$order_id";
$result_que=mysqli_query($con,$select_data);
$row_fetch=mysqli_fetch_assoc($result_que);
$invoice_number=$row_fetch['invoice_number'];
$amount_due=$row_fetch['amount_due'];

}
if(isset($_POST['confirm_pay'])){
    $invoice_num=$_POST['invoice_num'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into user_payments (order_id,invoice_number,amount,payment_mode)
     values ($order_id,$invoice_num,$amount,'$payment_mode')";
     $result=mysqli_query($con,$insert_query);
     if($result){
        echo "<h3 class='text-center text-light'>Payment completed</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";

     }
     $update_order="update user_orders set order_status='complete' where order_id=$order_id";
     $result_up=mysqli_query($con,$update_order);
     
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>
<body class='bg-secondary'>
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_num" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto" >
                <label class="text-light" for="">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto" >
                <select name="payment_mode" class="form-control w-50 m-auto" >
                 <option value="Select payment mode">Select payment mode</option>
                 <option value="Banking">Banking</option>
                 <option value="Cash On Delivery">Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto" >
                
                <input type="submit" class="bg-info py-2 px-3" value="Confirm Payment" name="confirm_pay">
            </div>
        </form>
    </div>
    
</body>
</html>