<?php
require('top.ad.php');

?>

<main>
    <div class="dash-cards">
        <div class="card-single">
            <div class="card-body">
                <div>
                    <h5>Order Master</h5>
                </div>
            </div>
            <div class="card-footer "> </div>
        </div>
    </div>
    <section class="recent ">
        <div class="activity-grid ">
            <div class="activity-card ">
                <div class="tabel-responsive ">
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Order Date</th>
                                <th>Address</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $res=mysqli_query($con,"select orders.*,order_status.name as order_status_str from orders,order_status where order_status.id=orders.order_status");
                            while($row=mysqli_fetch_assoc($res))
                            {
                        ?>
                            <tr>
                                <td><a class="bt" href="order_master_details.php?id=<?php echo $row['id'];?>"><?php echo $row['id'];?></a></td>
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
                        </tbody>
                    </table>     
                </div>
            </div>
        </div>
    </section>
</main> 
</div>
</body>
</html>