
<?php
require("connect.php");
require("g.function.inc.php");
require('add_to_card.inc.php');
$cat_res=mysqli_query($con,"select * from category where status=1 order by cat_name asc");
$cat_array=array();
 while($row=mysqli_fetch_assoc($cat_res))
 {
     $cat_array[]=$row;
 }
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
        Organic Farm
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/owl-carousel.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!---------- Header Section Open---------->
    <header>
        <a href="" class="logo">Organic veg&fruits  </a>
        
        <ul id="Menuitems">
            <li><a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="index.php")?"active":" "?>">Home</a></li>
            <li>
            <div class="dropdown">
                    <button class="dropbtn"><a href="product.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="product.php"||basename($_SERVER['PHP_SELF'])=="product.details.php"||basename($_SERVER['PHP_SELF'])=="categories.php")?"active":" "?>">Products</a></button>
                    <div class="dropdown-content">
                    <?php
                    foreach ($cat_array as $list)
                     {?>
                        <a href="categories.php?id=<?php echo $list['id'];?>"   class="<?php echo (basename($_SERVER['PHP_SELF'])=="categories.php")?"active":" "?>"  ><?php echo $list['cat_name'];?></a>
                    <?php }  ?>
                    </div>
                </div></li>
            <li><a href="" class="<?php echo (basename($_SERVER['PHP_SELF'])=="index.php")?"active":" "?>">About</a></li>
            <li><a href="contact.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="contact.php")?"active":" "?>">Contact</a></li>
            <?php
                
            if(isset($_SESSION['USER_ID']))   
            {?>
            <li><a href="my_order.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="my_order.php")?"active":" "?>">MyOrder</a></li>
            <li><a href="logout.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="login.php")?"active":" "?>">Logout</a></li>
            <?php }
            else{?>
            
            <li><a href="login.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="login.php")?"active":" "?>">Account</a></li>
            <?php } ?>
        </ul>
        <a href="card.php" class="htc__qua"> <img src="temp/cart.png" width="30px" height="30px"><span><?php echo $totalProduct ?></span>
        <!-- <span  class="htc__qua"><?//php// echo $totalProduct ?></a> --></a>
        <img src="temp/menu.png" class="menu-icon" id="img" onclick="menutoggle()">
    </header>