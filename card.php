<?php
require('g.top.php');
$pname='';
$pimage='';
$pprice='';
$key='';
$qty='';
$val='';
$subtotal='';
?>

<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>subtotal</th>
        </tr>
            <?php
            if(isset($_SESSION['cart']))
            {
                $subtotal=0;
                foreach($_SESSION['cart'] as $key=>$val)
                { 
                    $productArr=get_product($con,'','',$key);
                    $pname=$productArr['0']['name'];
                    $pimage=$productArr['0']['image'];
                    $pprice=$productArr['0']['price'];
                    $qty=$val['qty'];
                    $subtotal=$subtotal+($pprice*$qty);
                ?>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$pimage;?>" alt="">
                    <div>
                        <p><?php echo $pname;?></p>
                        <small>Price:<?php echo $pprice;?></small><br>
                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty;?>">
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">Update</a></td>
            <td>
                <?php 
                    echo$qty*$pprice;
                ?>
            </td>
        </tr>
            <?php }
            }
             ?>
    </table>
    
    <div class="option">
        <div class="continue">
            <button class="bt"><a href="<?php echo SITE_PATH?>">Continue Shopping</a></button>
        </div>
        <div class="checkout">
          <button class="bt"><a href="<?php echo SITE_PATH?>checkout.php">checkout</a></button>
        </div>      
    </div>
</div>

<?php
require('g.footer.php');
?>