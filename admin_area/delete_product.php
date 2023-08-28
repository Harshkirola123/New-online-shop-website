<?php

if (isset($_GET['delete_product'])) {
    $delete_id=$_GET['delete_product'];
    $delete_query="delete from `product` where product_id='$delete_id'";
    $delete_result=mysqli_query($con,$delete_query);
    if($delete_result){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete product</title>
</head>
<body>
    <h1>hjyrx</h1>
    
</body>
</html>