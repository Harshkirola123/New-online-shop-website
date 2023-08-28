<?php

if (isset($_GET['edit_brand'])) {
    $edit_id=$_GET['edit_brand'];
    $select_query = "select * from `brands` where Brands_id='$edit_id'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $brand_title = $row_fetch['Brands_title'];

    if (isset($_POST['update_brand'])) {
        $brand_title = $_POST['brand_title'];
        // echo $category_title;
        //update data

        $update_data = "update `brands` set Brands_title='$brand_title' where Brands_id=$edit_id";
        $update_query = mysqli_query($con, $update_data);
        if ($update_query) {
            echo "<script>alert('Update successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        .product_image{
            width: 10%;
            height: 10%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto m-4 text-center">
            <label for="brand_title" class="form-label">Category Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" value="<?php echo $brand_title; ?>" required>
        </div>
        
        <div class="text-center w-50 m-auto mt-2">
            <input type="submit" name="update_brand" value="Update Brand" class="btn btn-info px-3 mb-4">
        </div>
    </form>
    </div>
</body>
</html>