<?php

if (isset($_GET['delete_user'])) {
    $delete_id=$_GET['delete_user'];
    $delete_query="delete from `user_table` where user_id='$delete_id'";
    $delete_result=mysqli_query($con,$delete_query);
    if($delete_result){
        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
?>