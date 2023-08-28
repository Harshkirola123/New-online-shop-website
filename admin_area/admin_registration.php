<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            background-image: url(adminregister.avif);
            width: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../img/admin.jpg" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your Username" required class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" required>
            </div>
            <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm password" class="form-control" required>
            </div>
            <div>
                <input type="submit" value="Registration" class="bg-info py-2 px-3 border-0" name="admin_registration">
                <p class="small fw-bold mt-2 pt-1">Don you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
            </div>
            
        </form>
    </div>
    </div>

</div>
</body>
</html>
<?php
if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['confirm_password'];
    $admin_ip = getIPAddress();

    $select_query = "select * from `admin_table` where admin_name = '$admin_username' or admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 1) {
        echo "<script>alert('Username,Email already present')</script>";
    } elseif ($admin_password != $conf_admin_password) {
        echo "<script>alert('Password do not match')</script>";
    } else {
        // echo 'User Real IP Address - '.$ip; 
        $insert_query = "insert into `admin_table`(admin_name,admin_email,admin_password) values ('$admin_username','$admin_email','$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
        if (isset($sql_execute)) {
            echo "<script>alert('Registration succesfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }

}



?>