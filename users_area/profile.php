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
    <title>E-Commerce --User profile</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../styles.css">
    <style>
        .profile_img {
            width: 90%;
            height: 90%;
            margin: auto;
            display: block;
            object-fit: contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navebar-light bg-info">
            <div class="container-fluid">
                <img src="../img/Logo.jpg" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Prize:
                                <?php total_cart_price() ?> /-
                            </a>
                            <a href=""></a>
                        </li>
                    </ul>

                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
        </nav>


        <!-- calling card function -->
        <?php
        cart();
        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navebar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li> -->
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a>
</li>";
                } else {

                    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
</li>";
                }


                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
</li>";
                } else {

                    echo "<li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
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
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>

                    <?php
                        $user_name=$_SESSION['username'];
                        $user_img="select * from `user_table` where username = '$user_name'";
                        $result_image= mysqli_query($con,$user_img);
                        $row_image=mysqli_fetch_array($result_image);
                        $user_image=$row_image['user_image'];
                        echo "<li class='nav-item'>
                        <img src='./user_images/$user_image' class='profile_img my-4'>
                    </li>";
                    ?>
                    
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?profile">
                            Pending order
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_acount">
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?my_order">
                            My order
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="logout.php">
                        Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="text-center col-md-10">
                <?php
                get_user_order(); 
                if(isset($_GET['edit_acount'])){
                    include('edit_account.php');
                }
                
                if(isset($_GET['my_order'])){
                    include('my_order.php');
                }

                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>




        <!-- last child -->
        <?php include("../includes/footer.php") ?>
    </div>





    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

</body>

</html>