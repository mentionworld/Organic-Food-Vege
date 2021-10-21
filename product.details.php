<?php
require('g.top.php');
 $product_id=mysqli_real_escape_string($con,$_GET['id']);
if($product_id>0)
{
     $get_product=get_product($con,'','', $product_id);
}
else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
?>
<div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'];?>" width="100%" id="product-img">

                <!-- <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="temp/4.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="temp/4.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="temp/4.jpg" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="temp/4.jpg" alt="" width="100%" class="small-img">
                    </div>
                </div>
 -->

            </div>
            <div class="col-2 ">
             <a href="index.php " class="btn2">Home</a>
              <span>></span><a class="btn2" href="category.php?id=<?php  echo $get_product['0']['cat_id'];?>"><?php echo $get_product['0']['cat_name'];?></a>
                                  <span>></span>
                                  <?php  echo $get_product['0']['name'];?>
                <h1><?php  echo $get_product['0']['name'];?></h1>
                <h4>Rs.<?php  echo $get_product['0']['price'];?></h4>
                <!-- <select name="" id="">
                    <option value="">Select Size</option>
                    <option value="">XXL</option>
                    <option value="">XL</option>
                    <option value="">Large</option>
                    <option value="">Medium</option>
                    <option value="">Small</option>
                </select> -->
                <input id="qty" type="number" name="num" value="2">
                <!-- <?//php echo "<a class='btn' href='manage.cart.php?type=add&qty&pid=".$get_product['0']['id']."'>Add to Card</a>"?>; -->
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')" class="btn">Add to Card</a>
                <h3>Product details <i class="fa fa-indent"></i></h3><br>
                <p><?php  echo $get_product['0']['description'];?></p>
            </div>
        </div>
    </div>
    <!------------title--------------------------->
    <div class="small-container">
        <div class="row row3">
            <h2>Related Products</h2>
            <p><a href="" class="btn2"> View More</a></p>
        </div>
    </div>
    <!--------------products------------>
    <div class="small-container">
        <div class="row">
        <?php
                $get_product=get_product($con,'8');               
                foreach ($get_product as $value)
                {
                ?>
            
            <div class="col-4">
            <a href="product.details.php?id=<?php echo $value['id'];?>">
                     <img width="180px" height="200px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$value['image'];?>" alt="product images">
                   </a>
                <h4><?php echo $value['name'];?></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p><?php echo $value['price'];?></p>
            </div>
            <?php }?>
        </div>
    </div>
  
<?php
require('g.footer.php');
?>