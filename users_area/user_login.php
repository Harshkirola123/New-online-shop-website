<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User - Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="form.css">

    <style>
        body {
            /* overflow-x: hidden; */
            width: 100%;
            background: url(online-shopping.png) ;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <!-- <link rel="stylesheet" href=".css"> -->
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">

                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label text-light">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" name="user_login" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger">Register</a></p>

                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    include('../includes/connect.php');
    $user_name = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "select * from `user_table` where username='$user_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart item
    $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    // echo "<script>alert($row_count)</script>";

    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login successfully')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>