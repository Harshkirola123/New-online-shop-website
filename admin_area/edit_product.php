<?php

if (isset($_GET['edit_product'])) {
    $edit_id=$_GET['edit_product'];
    $select_query = "select * from `product` where product_id='$edit_id'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $product_title = $row_fetch['product_title'];
    $product_description = $row_fetch['product_description'];
    $product_keywords = $row_fetch['product_keywords'];
    $product_price = $row_fetch['product_price'];
    $Category_id = $row_fetch['Category_id'];
    $Brands_id = $row_fetch['Brands_id'];
    $product_image1 = $row_fetch['product_image1'];
    $product_image2 = $row_fetch['product_image2'];
    $product_image3 = $row_fetch['product_image3'];

    $select_categories="select * from `categories` where Category_id='$Category_id'";
    $result_categories = mysqli_query($con, $select_categories);
    $row_category = mysqli_fetch_assoc($result_categories);
    $Category_title=$row_category['Category_title'];

    $select_brands="select * from `brands` where Brands_id='$Brands_id'";
    $result_brands = mysqli_query($con, $select_brands);
    $row_brands = mysqli_fetch_assoc($result_brands);
    $Brands_title=$row_brands['Brands_title'];

    if (isset($_POST['update_product'])) {
        $update_id = $user_id;
        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $product_price = $_POST['product_price'];
        $Category_id=$_POST['product_categories'];
        $Brand_id=$_POST['product_brands'];
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image1_temp = $_FILES['product_image1']['tmp_name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image2_temp = $_FILES['product_image2']['tmp_name'];
        $product_image3 = $_FILES['product_image3']['name'];
        $product_image3_temp = $_FILES['product_image3']['tmp_name'];
        move_uploaded_file($product_image1_temp, "./product_images/$product_image1");
        move_uploaded_file($product_image2_temp, "./product_images/$product_image2");
        move_uploaded_file($product_image3_temp, "./product_images/$product_image3");
        //update data

        $update_data = "update `product` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',Category_id='$Category_id',Brands_id='$Brand_id',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',date=NOW(),product_price='$product_price' where product_id=$edit_id";
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
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto m-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title; ?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description; ?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_categories" class="form-select">
                <option value="<?php echo $Category_id; ?>"><?php echo $Category_title; ?></option>
                <?php
                $select_categories_all="select * from `categories`";
                $result_categories_all = mysqli_query($con, $select_categories_all);
                while($row_category_all = mysqli_fetch_assoc($result_categories_all)){
                    $category_title=$row_category_all['Category_title'];
                    $category_id=$row_category_all['Category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };                
                ?>
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
            <option value="<?php echo $Brands_id; ?>"><?php echo $Brands_title; ?></option>
                <?php
                $select_brand_all="select * from `brands`";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['Brands_title'];
                    $brand_id=$row_brand_all['Brands_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                };                
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="File" name="product_image1" id="product_image1" class="form-control" required>
            <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_image">
            </div>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="File" name="product_image2" id="product_image2" class="form-control" required>
            <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_image">
            </div>
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="File" name="product_image3" id="product_image3" class="form-control" required>
            <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price; ?>" required>
        </div>
        <div class="text-center w-50 m-auto">
            <input type="submit" name="update_product" value="Update Product" class="btn btn-info px-3 mb-4">
        </div>
    </form>
    </div>
</body>
</html>