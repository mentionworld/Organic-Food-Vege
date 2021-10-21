<?php
require('g.top.php'); 
?>
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product ID</th>
            <th>Order Date</th>
            <th>Address</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Order Status</th>
        </tr>
            <?php
            $uid=$_SESSION['USER_ID'];
            $res=mysqli_query($con,"select orders.*,order_status.name as order_status_str from orders,order_status where orders.user_id='$uid' and order_status.id=orders.order_status");
            while($row=mysqli_fetch_assoc($res))
            {
            ?>
        <tr>
            <td><a class="bt" href="my_order_details.php?id=<?php echo $row['id'];?>"><?php echo $row['id'];?></a></td>
            <td><?php echo $row['added_on'];?></td>
            <td><?php echo $row['address'];?><br>
                <?php echo $row['city'];?><br>
                <?php echo $row['pincode'];?>
            </td>
            <td><?php echo $row['payment_type'];?></td>
            <td><?php echo $row['payment_status'];?></td>
            <td><?php echo $row['order_status_str'];?></td>
            
        </tr>
            <?php }
             ?>
    </table>
</div>

<?php 
require('g.footer.php');
?>