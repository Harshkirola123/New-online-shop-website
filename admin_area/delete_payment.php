<?php

if (isset($_GET['delete_payment'])) {
    $delete_id=$_GET['delete_payment'];
    $delete_query="delete from `user_payment` where payment_id='$delete_id'";
    $delete_result=mysqli_query($con,$delete_query);
    if($delete_result){
        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
?>