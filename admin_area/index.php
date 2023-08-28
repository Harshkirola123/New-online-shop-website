<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Css file -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        .Admin_img {
            width: 100px;
            object-fit: contain;
        }

        .footer {
            position: absolute;
            bottom: 0;
        }
    </style>

    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php    
if (isset($_SESSION['admin_name'])) {?>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/Logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-items">
                            <!-- <a href="#" class="nav-link">Welcome Guest</a> -->
                            <?php
                            if (!isset($_SESSION['admin_name'])) {
                                echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a>
</li>";
                            } else {

                                echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome " . $_SESSION['admin_name'] . "</a>
</li>";
                            }

                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../img/black1.jpg" alt="" class="Admin_img"></a>
                    <?php
                            if (!isset($_SESSION['admin_name'])) {
                                echo "<p class='text-light text-center'>Admin Name</p>";
                            } else {

                                echo "<p class='text-light text-center'>Welcome ". $_SESSION['admin_name'] ." </p>";
                            }

                            ?>
                </div>

                <div class="button text-center m-auto">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-2">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info p-2 my-1">View Products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info p-2 my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info p-2 my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info p-2 my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1 p-2">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-2">All Orders</a></button>
                    <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1 p-2">All Payments</a></button>
                    <button><a href="index.php?list_user" class="nav-link text-light bg-info my-1 p-2">List Users</a></button>
                    <button><?php if (!isset($_SESSION['admin_name'])) {
                                // echo "<a href='admin_login.php' class='nav-link text-light bg-info my-1 p-2'>Login</a>";
                            } else {

                                echo "<a href='admin_logout.php' class='nav-link text-light bg-info my-1 p-2'>Logout</a>";
                            } ?></button>
                </div>

            </div>
        </div>

        <!-- forth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brands'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_product.php');
            }
            if (isset($_GET['edit_product'])) {
                include('edit_product.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brand'])) {
                include('view_brand.php');
            }

            if (isset($_GET['edit_category'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['list_payment'])) {
                include('list_payment.php');
            }

            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }

            if (isset($_GET['list_user'])) {
                include('list_user.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            ?>

        </div>

        <!-- <div class="bg-info p-3 text-center footer">
            <p>All right reserved Designed by BCA-2023</p>
            </div>  -->
        <?php include("../includes/footer.php") ?>

    </div>




    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<?php
}else{
    echo "<script>alert('If You are a Admin Please Login first')</script>";
    echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

</html>