<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User - registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* *{
            overflow-x: hidden;
        } */
        body{
            /* background-color: white; */
            background-image: url(background.avif);
            width: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-3" id="containers">
        <h2 class="text-center pt-3">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" name="user_image" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" name="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control" placeholder="Enter your Mobile number" autocomplete="off" required>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-info py-2 px-3 border-0">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger">Login</a></p>

                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    $select_query = "select * from `user_table` where username = '$user_username' or user_email='$user_email' or user_mobile='$user_contact'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 1) {
        echo "<script>alert('Username,Email and Mobile number already present')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('Password do not match')</script>";
    } else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        // echo 'User Real IP Address - '.$ip; 
        $insert_query = "insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        if (isset($sql_execute)) {
            echo "<script>alert('Registration succesfully')</script>";
        }
    }

    //Selecting cart items
    $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in you cart.')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}



?>