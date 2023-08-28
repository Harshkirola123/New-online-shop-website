<h3 class="text-center text-success">All Payment</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>SI no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Payment Date</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light text-center">
        <tr>
            <?php
            $get_brand = "select * from `user_payment`";
            $result = mysqli_query($con, $get_brand);
            $number=0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $payment_id = $row_data['payment_id'];
                $order_id = $row_data['order_id'];
                $invoice_number = $row_data['invoice_number'];
                $amount = $row_data['amount'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;
            ?>
        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $payment_mode; ?></td>
            <td><?php echo $date; ?></td>
            <td><a href='index.php?delete_payment=<?php echo $payment_id; ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payment" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id; ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>