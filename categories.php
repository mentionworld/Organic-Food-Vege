<?php
require('g.top.php');
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
if($cat_id>0)
{
    $get_product=get_product($con,'',$cat_id);
   // prx($get_product);

}
else{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
?>

<section class="slider">
                <div class="slide_item fade">
                    <div class="row " active>
                        <div class="col-2">
                            <h1>Give Your Workout<br> A New Style!</h1>
                            <p>Success isn't always about greatness. It's about consistency. Consistent <br>hard work gains success. Greatness will come.</p>
                            <a href="" class="btn">Explore Now &#8594;</a>
                        </div>
                        <div class="col-2">
                            <img src="temp/app1.jpg" alt=""  width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <div class="slide_item fade">
                    <div class="row ">
                        <div class="col-2">
                            <h1>Give Your Workout<br> A New Style!</h1>
                            <p>Success isn't always about greatness. It's about consistency. Consistent <br>hard work gains success. Greatness will come.</p>
                            <a href="" class="btn">Explore Now &#8594;</a>
                        </div>
                        <div class="col-2">
                            <img src="temp/app2.jpg" alt="" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <div class="slide_item fade">
                    <div class="row ">
                        <div class="col-2">
                            <h1>Give Your Workout<br> A New Style!</h1>
                            <p>Success isn't always about greatness. It's about consistency. Consistent <br>hard work gains success. Greatness will come.</p>
                            <a href="" class="btn">Explore Now &#8594;</a>
                        </div>
                        <div class="col-2">
                            <img src="temp/1.png" alt="">
                        </div>
                    </div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div><br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
</section>
    
    <!------------Featured Products--------------------------->
    <div class="small-container">
        <div class="row row3">
            <?php if(count($get_product)>0)
            {?>
            <h2>All products</h2>
            <select>
				<option>Default Shorting</option>
				<option>Short by Price</option>
				<option>Short by popularity</option>
				<option>Short by Rating</option>
				<option>Short by Sale</option>
			</select>
        </div>
        <div class="row">
            <?php
               // $get_product=get($con);               
                foreach ($get_product as $value)
                {
                ?>
                  <div class="col-4">
                    <a href="product.php?id=<?php echo $value['id'];?>">
                     <img width="180px" height="200px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$value['image'];?>" alt="product images">
                   </a>
                   <h4><a href="#"><?php echo $value['name'];?></a></h4>
                     <div class="rating">
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star-o"></i>
                     </div>
                     <div class="by">
                         <p><?php echo $value['price'];?></p>
                         <a href="" class="btn1">View More &#8594;</a>
                     </div>
                 </div>
             <?php }?>   
        </div>
        <?php } else{
                        echo "Data not fount";
                    }   ?>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>&#8594</span>
        </div>  
    </div>

<?php
require('g.footer.php');
?>