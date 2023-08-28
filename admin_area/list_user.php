<style>
    .user_img {
            width: 90px;
            object-fit: contain;
        }
</style>

<h3 class="text-center text-success">All User</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>SI no</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <tr>
            <?php
            $get_user = "select * from `user_table`";
            $result = mysqli_query($con, $get_user);
            $number=0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
            ?>
        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $username; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo "<img src='../users_area/user_images/$user_image' alt='$user_image' class='user_img'/>"; ?></td>
            <td><?php echo $user_address; ?></td>
            <td><?php echo $user_mobile; ?></td>
            <td><a href='index.php?delete_user=<?php echo $user_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>

    <?php
            }
    ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h4>Are you sure you want to delete this?</h4>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_user" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id; ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>