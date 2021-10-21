<?php
require('g.top.php');
$sql=mysqli_query($con,"select * from product order by id desc");
?>
<section class="slider">
                <div class="slide_item fade">
                    <div class="row ">
                        <div class="col-2">
                            <h1>Apple</h1>
                            <p>The apple is a pome (fleshy) fruit, in which the ripened ovary and surrounding tissue both become fleshy and edible.</p>
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
    
    <!----------------Header Section Ended----------------->
    <div class="wrapper">
		<div class="carousel owl-carousel">
            <?php
             $get_product=get_product($con,'6');
             // prx($get_product);               
              foreach ($get_product as $value)
              { ?>
			    <div class="card card-1"><a href="product.details.php?id=<?php echo $value['id'];?>">
                 <img width="180px" height="200px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$value['image'];?>" alt="product images">
                   </a>
                <div class="overlay">
                        <div class="text">
                                apple price
              </div>
                        <!-- <div class="price">price</div> -->
                        <!-- <div class="text">apple</div> -->
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                
                        <!-- <div class="text">apple</div> -->
                    </div> 
                </div>
                <?php }?>
			<!-- <div class="card card-2">B</div>
			<div class="card card-3"><img src="gps1.jpg" alt="">
                   <div class="overlay">
                    <div class="text">Hello World</div>
                    </div> </div>
			<div class="card card-4">D</div>
			<div class="card card-5">E</div>
			<div class="card card-6">F</div>
			<div class="card card-7">G</div> -->
		</div>
	</div>
    <!------------Featured Products--------------------------->
    <div class="small-container">
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <?php
                $get_product=get_product($con,'8');
               // prx($get_product);               
                foreach ($get_product as $value)
                {
                   // prx($value);
                ?>
                  <div class="col-4">
                    <a href="product.details.php?id=<?php echo $value['id'];?>">
                     <img width="180px" height="200px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$value['image'];?>" alt="product images">
                   </a>
                   <h4><a href="#"><?php echo $value['name'];?></a></h4>
                     <!-- <div class="rating">
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star-o"></i>
                     </div> -->
                     <div class="by">
                         <p><?php echo $value['price'];?></p>
                         <!-- <a href="product.details.php?id=<?php echo $value['id'];?>" class="btn1">View More &#8594;</a> -->
                     </div>
                 </div>
             <?php }?>   
        </div>
    </div>
    <!---------Ends of Featured Products-------->
    <!----------Offer-------------------------
    <div class="Offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="temp/4.jpg" class="offee-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>The Mi Smart Band 4 features a 39.9% larger (than Mi Band 3) AMOLED color full-touch display with adjustable brightness, so everything is clear as can be.</small><br>
                    <a href="" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!-------End of Offer ------------->

    <!--------Testimonial--------------->
    <!-- <div class="Testimonial">
        <div class="small-container ">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="temp/4.jpg">
                    <h3>Sea Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="temp/4.jpg">
                    <h3>mikka lorem</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="temp/4.jpg">
                    <h3>Seam karan</h3>
                </div>
            </div>
        </div>
    </div> -->
    <div class="Testimonial">
		<div class="small-container">
			<div class="row32">
				<div class="col-3">
					<i class="fa fa-quote-left"></i>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
					</p>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="images/user-1.png">
					<h3>Sea Parker</h3>
				</div>
				<div class="col-3">
					<i class="fa fa-quote-left"></i>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
					</p>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="images/user-2.png">
					<h3>mikka lorem</h3>
				</div>
				<div class="col-3">
					<i class="fa fa-quote-left"></i>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
					</p>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="images/user-3.png">
					<h3>Seam karan</h3>
				</div>
			</div>
		</div>
	</div>
<?php
require('g.footer.php');
?>