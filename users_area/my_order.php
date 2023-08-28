<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $username=$_SESSION['username'];
    $get_user="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];  
        ?>
<h3 class="text-success">All my Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>SI no</th>
        <th>Order number</th>
        <th>Amount due</th>
        <th>Total product</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_order_details="select * from `user_orders` where user_id=$user_id";
        $result_order_query=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_order=mysqli_fetch_assoc($result_order_query)){
            
            $oid=$row_order['order_id'];
            $amount_due=$row_order['amount_due'];
            $invoice_number=$row_order['invoice_number'];
            $total_products=$row_order['total_products'];
            $order_status=$row_order['order_status'];
            $order_date=$row_order['order_date'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }

            
            echo "<tr>
            <td>$number</td>
            <td>$oid</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
        ?>
        <?php

            if($order_status == 'Complete'){
                echo "<td>Paid</td>";
            }
            else{
                echo " <td><a href='confirm_payment.php?order_id=$oid' class='text-lightblue'>Confirm</a></td>
                </tr>";
            }
        }
        $number++;
        ?>
        
    </tbody>
</table>
</body>
</html>