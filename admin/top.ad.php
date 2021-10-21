
<?php
require("function.inc.php");
require("connection.inc.php"); 

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title> Organic Vegetable & Fruits
    </title>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="demo.css">
</head>

<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <span></span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a  href="ad.home.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="ad.home.php" || basename($_SERVER['PHP_SELF'])=="manage.categories.php")?"active":" "?>">
                        <span class="img"><img src="img/category.jpg"> </span>
                        <span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="product.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="product.php" || basename($_SERVER['PHP_SELF'])=="manage.product.php")?"active":" "?>">
                        <span class="img"><img src="img/product.png"></span>
                        <span>Product details<span>
                    </a>
                </li>
                <li>
                    <a href="order_master.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="order_master.php" ||basename($_SERVER['PHP_SELF'])=="order_master_details.php"||basename($_SERVER['PHP_SELF'])=="order_master.php")?"active":" "?>">
                        <span class="img"><img src="img/images.png"></span>
                        <span>Order Master</span>
                    </a>
                </li>
                <li>
                    <a href="users.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="users.php")?"active":" "?>">
                        <span class="img"><img src="img/users.png"></span>
                        <span>User Listing</span>
                    </a>
                </li>
                <li>
                    <a href="contact.us.php" class="<?php echo (basename($_SERVER['PHP_SELF'])=="contact.us.php")?"active":" "?>">
                        <span class="img"><img src="img/contact.png"></span>
                        <span>Contact Us</span>
                    </a>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="search-wrapper">
            </div>
            <div class="social-icons">
                 <a href="Logout.php">Logout</a>
                <div></div>
            </div>
        </header>

