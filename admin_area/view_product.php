<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product_image{
            width: 10%;
            height: 10%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h2 class="text-center text-success">All product</h2>
    <table class="table table-bordered mt-5 text-center">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_product="select * from `product`";
            $result=mysqli_query($con,$get_product);
            while($row_data=mysqli_fetch_assoc($result)){
                $product_id=$row_data['product_id'];
                $product_title=$row_data['product_title'];
                $product_image=$row_data['product_image1'];
                $product_price=$row_data['product_price'];
                $status=$row_data['status'];
                ?>
                <tr>
                <td><?php echo $product_id; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image; ?>'  class='product_image'></td>
                <td><?php echo $product_price; ?>/-</td>
                <td><?php 
                $get_count="select * from `order_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $row_count=mysqli_num_rows($result_count);
                echo $row_count;
                
                ?></td>
                <td><?php echo $status ;?></td>
                <td><a href='index.php?edit_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>




            
        </tbody>
    </table>
</body>
</html>