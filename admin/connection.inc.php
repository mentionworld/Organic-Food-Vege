<?php
	session_start();
	$con= mysqli_connect("localhost","root","","organic") or die("not connected");
	define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Organic/');
	define('SITE_PATH','http://localhost/Organic/');
	define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH.'media/product/');
	define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH.'media/product/');
	
?>