
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form class="mt-5" action="" method="post">
        <div class="form-outline">
            <input type="submit" name="delete" class="form-control mb-4 m-auto w-50 " value="Delete Account">
        </div>
        <div class="form-outline">
            <input type="submit" name="not_delete" class="form-control mb-4 m-auto w-50 " value="Don't Delete Account">
        </div>
    </form>
<?php 
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="delete from `user_table` where username='$username_session'";
        $delete_result=mysqli_query($con,$delete_query);
        if($delete_result){
            session_destroy();
            echo "<script>alert('Account deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['not_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";

    }
?>

</body>
</html>