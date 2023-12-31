<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data="select* from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $price=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payment` (order_id,invoice_number,amount,payment_mode,date) values ($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('Successfully completed the payment')</script>";
        // echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $update_query=mysqli_query($con,$update_order);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <form action="" method="post" class="container my-5">
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value=<?php echo $invoice_number ?>>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light mb-2">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value=<?php echo $price ?>>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
        <select name="payment_mode" class="form-control w-50 m-auto">
            <option value="">Select Payment Mode</option>
            <option value="UPI">UPI</option>
            <option value="Netbanking">Netbanking</option>
            <option value="Paypal">Paypal</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
        </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class="bg-info py-2 px-3 border-0 w-50 m-auto" value="Confirm" name="confirm_payment">
        </div>
    </form>
    </div>
</body>
</html>