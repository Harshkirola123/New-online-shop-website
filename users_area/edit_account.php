<?php

if (isset($_GET['edit_acount'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $useremail = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp, "./user_images/$user_image");
        //update data

        $update_data = "update `user_table` set username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
        $update_query = mysqli_query($con, $update_data);
        if ($update_query) {
            echo "<script>alert('Update successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit Account</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" name="user_username" class="form-control w-50 m-auto" value="<?php echo $username ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" name="user_email" class="form-control w-50 m-auto" value="<?php echo $useremail ?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" name="user_image" class="form-control m-auto">
            <img src="./user_images/<?php echo $user_image ?>" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_address" class="form-control w-50 m-auto" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="user_mobile" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>">
        </div>
        <input type="submit" value="update" name="user_update" class="bg-info py-2 px-3 border-0 mb-2">

    </form>


</body>

</html>