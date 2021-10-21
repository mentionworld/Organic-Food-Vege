<?php
require('top.ad.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update']))
{
    echo $update_order_status=$_POST['order_update'];
    mysqli_query($con,"update orders set order_status='$update_order_status' where id='$order_id'");
}
else{
    echo"khsgfhasgfhjgfasgkfkhsgfhsgdfhksaggsdfkasgjsagfkahgfasgfashdvhcvdshcvhsdvcsgduygkgjhad";
}
?>

<main>
    <div class="dash-cards">
        <div class="card-single">
            <div class="card-body">
                <div>
                    <h5>Order Details</h5>
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
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Qty</th>
                                 <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $total_price=0;
                            $res=mysqli_query($con,"select distinct(order_details.id),order_details.*,product.name,product.image,orders.address,orders.city,orders.pincode
                             from order_details,product,orders where order_details.order_id='$order_id' and 
                              product.id=order_details.product_id");
                            while($row=mysqli_fetch_assoc($res))
                            {
                                 $total_price= $total_price+$row['price']*$row['qty'];
                                 $address=$row['address'];
                                 $city=$row['city'];
                                 $pincode=$row['pincode'];
                        ?>
                            <tr>
                                <td><?php echo $row['name'];?></td>
                                <td> <img width="60px" height="60px" src="<?php echo PRODUCT_IMAGE_SITE_PATH. $row['image'];?>"></td>
                                <td><?php echo $row['qty'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td><?php echo $row['price']*$row['qty'];?></td>
                            </tr>
                        <?php }
                        ?>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td><?php echo $total_price;?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="address_details">
                         <strong>Address::</strong>
                            <?php echo $address;?>,    <?php echo $city;?>,    <?php echo $pincode;?><br><br>
                            <strong>Order Status</strong>
                            <?php
                                $order_status_Arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,orders
                                where orders.id='$order_id' and orders.order_status=order_status.id")); 
                             echo $order_status_Arr['name'];
                            ?>
                            <div>
                                <form action="" method="post">
                                    <select name="order_update" class="form-control" id="">
                                        <option value="disable"> Select Status</option>
                                            <?php
                                                $res=mysqli_query($con,"select  * from order_status");
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    if($row['id']==$categories_id)
                                                    {
                                                        echo "<option  selected value=".$row['id'].">".$row['name']."</option>";
                                                    }
                                                    else
                                                    {
                                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                        <input type="submit" name="update" class="form-control">
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main> 
</div>
</body>
</html>