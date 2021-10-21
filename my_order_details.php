<?php
require('g.top.php');
$order_id=get_safe_value($con,$_GET['id']); 
?>
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total Price</th>
           
        </tr>
            <?php
            $uid=$_SESSION['USER_ID'];
            $total_price=0;
            $res=mysqli_query($con,"select distinct(order_details.id),order_details.*,product.name,product.image from order_details,product,orders where order_details.order_id='$order_id' and orders.user_id='$uid' and product.id=order_details.product_id");
            while($row=mysqli_fetch_assoc($res))
            {
                $total_price= $total_price+$row['price']*$row['qty'];
            ?>
        <tr>

            <td><?php echo $row['name'];?></td>
            <td> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH. $row['image'];?>"></td>
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
            
    </table>
</div>

<?php 
require('g.footer.php');
?>