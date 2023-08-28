<?php

if (isset($_GET['delete_brand'])) {
    $delete_id=$_GET['delete_brand'];
    $delete_query="delete from `brands` where Brands_id='$delete_id'";
    $delete_result=mysqli_query($con,$delete_query);
    if($delete_result){
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }

}
?>