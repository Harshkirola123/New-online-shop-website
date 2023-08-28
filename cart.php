<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce-cart details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="styles.css">
    <style>
        .cart_img {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navebar-light bg-info">
            <div class="container-fluid">
                <img src="./img/Logo.jpg" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Product</a>
                        </li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        } else {

                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                    </ul>
                </div>
        </nav>


        <!-- calling card function -->
        <?php
        cart();
        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navebar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
if (!isset($_SESSION['username'])) {
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a>
</li>";
} else {

    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li>";
}


                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
</li>";
                } else {

                    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
</li>";
                }

                ?>
            </ul>
        </nav>


        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center">All cloth store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>


        <!-- Fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <!-- php code to display dynamic data -->
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        $total = 0;
                        $cart_query = "select * from `cart_details` where ip_address='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_product = "select * from `product` where product_id='$product_id'";
                                $result_product = mysqli_query($con, $select_product);
                                while ($row_product_price = mysqli_fetch_array($result_product)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total += $product_values;

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $product_title ?>
                                        </td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image ?>" alt=""
                                                class="cart_img"></td>
                                        <td><input type="text" class="form-input w-50" name="qty"></td>
                                        <?php
                                        global $con;
                                        $ip = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantity = $_POST['qty'];
                                            $update_cart = "update `cart_details` set quantity=$quantity where ip_address='$ip'";
                                            $result_products = mysqli_query($con, $update_cart);
                                            $total = $total * $quantity;
                                        }
                                        ?>
                                        <td>
                                            <?php echo $price_table ?>/-
                                        </td>
                                        <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>" id="">
                                        </td>
                                        <td>
                                            <!-- <button class="bg-info px-3 py-2 mx-3 ">Update</button> -->
                                            <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3"
                                                name="update_cart">
                                            <!-- <button class="bg-info px-3 py-2 mx-3">Remove</button> -->
                                            <input type="submit" value="Remove" class="bg-info px-3 py-2 mx-3" name="remove_cart">

                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                        </tbody>
                    </table>


                    <!-- subtotal -->
                    <div class='d-flex mb-5'>
                        <?php
                        global $con;
                        $ip = getIPAddress();
                        // $total = 0;
                        $cart_query = "select * from `cart_details` where ip_address='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "
                    <h4 class='px-3'>Subtotal: <strong class='text-info'> $total/-</strong> </h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>
                    <button class='bg-secondary px-3 py-2 '><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3' name='continue_shopping'>";
                        }
                        if(isset($_POST['continue_shopping'])){
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>
                    </div>
            </div>
        </div>
        </form>

        <!-- fnction to remove item -->
        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['remove_item'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }

        echo remove_cart_item();
        ?>

        <!-- last child -->
        <?php include("./includes/footer.php") ?>
    </div>





    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>

</body>

</html>