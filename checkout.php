<?php

use function PHPSTORM_META\map;

require('g.top.php');

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
{
    header('location:index.php');
    die();
}

if(isset($_POST['submit']))
{
    $name=get_safe_value($con,$_POST['username']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $password=get_safe_value($con,$_POST['password']);
    $added_on= date('Y-m-d h:i:s');

    $check_user= mysqli_num_rows(mysqli_query($con,"select * from users where email='$email' AND username='$username'"));
    if($check_user>0)
    {
        echo '<script>alert("Email  Or Username Aready taken")</script>';
    }
    else
    {
        $added_on=date('Y-m-d h:i:s');
        $result=mysqli_query($con,"insert into users(username,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')");
        // if($result)
        // echo"Inserted successfully";
    }
}

 $msg='';
if(isset($_POST['login']))
{
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    $sql="select * from users where username='".$username."'and password='".$password."'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0)
    { 
        $row=mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_USERNAME']=$username;
        $_SESSION['USER_ID']=$row['id'];
        header('location:checkout.php');
        die();
        
    }
    else
    {
        echo '<script>alert("Please Enter Correct Login detail")</script>';
    }
}
    $Cart_total=0;
    foreach($_SESSION['cart'] as $key=>$val)
    { 
        $productArr=get_product($con,'','',$key);
        $pprice=$productArr['0']['price'];
        $qty=$val['qty'];
        $Cart_total=$Cart_total+($pprice*$qty);
    }
if(isset($_POST['upload']))
{
    //prx($_POST);
    //$fname=get_safe_value($con,$_POST['First_Name']);
    $Street=get_safe_value($con,$_POST['Street']);
    $Apart=get_safe_value($con,$_POST['Apart']);
    $City=get_safe_value($con,$_POST['City']);
    $zip=get_safe_value($con,$_POST['zip']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
    $added_on= date('Y-m-d h:i:s');
    $user_id=$_SESSION['USER_ID'];
    $total_price=$Cart_total;
    $payment_status='pending';
    if($payment_type=='COD')
    {
        $payment_status='success';
    }
    $order_status='1';
    mysqli_query($con,"insert into orders(user_id,address,city,pincode,total_price,payment_type,payment_status,order_status,added_on) values('$user_id','$Street','$City','$zip','$total_price','$payment_type','$payment_status','$order_status','$added_on')");

    $order_id=mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $key=>$val)
    { 
        $productArr=get_product($con,'','',$key);
        $pprice=$productArr['0']['price'];
        $qty=$val['qty'];
        mysqli_query($con,"insert into order_details(order_id,product_id,qty,price) values('$order_id','$key','$qty','$pprice')");

    }

    unset($_SESSION['cart']);
    ?>
    <script>
    alert('Your Order has been placed Successfully');
    window.location.href='index.php';
    </script>
<?php 
}

?>
<div class="checkout-page">
        <div class="container">
            <div class="check">
                <div class="col-21">
                  <div class="detail-cantainer">
                      <?php
                            $type_class='collapsible';
                            $head='fill the details';
                            if(!isset($_SESSION['USER_LOGIN']))
                            {
                                $type_class='collapsible_hide';
                                $head='';
                            
                       ?>   <h4>Please Login</h4>
                            <button class="collapsible"><span id="span" style="float: right; " >+</span>Login Details</button>
                            <div class="content">
                            <div class="form-cantainer">
                                    <div class="form-btn">
                                        <span onclick="login()">Login</span>
                                        <span onclick="register()">Register</span>
                                        <hr id="indicator">
                                    </div>
                                    <form  method="post" action="" id="loginform" >
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                        <input type="password" name="password" class="form-control" placeholder="password" required>
                                        <button class="btn" name="login" type="submit">Login</button>
                                        <a href="#">Forgot password</a>
                                    </form>
                            
                                    <form method="post" action="" id="regiform" >
                                        <input type="text"  class="form-control" name="username" placeholder="Username" required>
                                        <input type="email" name="email" class="form-control" placeholder="email" required>
                                        <input type="text" name="mobile" class="form-control" placeholder="contact Number" required>
                                        <input type="password" name="password" class="form-control"  placeholder="password" required>
                                        <button class="btn" name="submit" type="submit">Login</button>
                                        <a href="#">Forgot password</a>
                                    </form>
                                </div>
                            </div>
                    <?php   }   ?>
                    <form method="post" >
                            <h4><?php echo $head;?></h4>
                            <button class="<?php echo $type_class;?>"><span id="span" style="float: right">+</span>Address Details</button>
                            <div class="content">
                                <!-- <input type="text"  class="form-control" name="First_Name" placeholder="First Name" required> -->
                                <input type="tetx" class="form-control"  name="Street" placeholder="Street Address" required>
                                <input type="text"  class="form-control"  name="Apart" placeholder="Apartment/Block/House(optional)">
                                <input type="text" class="form-control" name="City" placeholder="City/State" required>
                                <input type="text"  class="form-control"  name="zip" placeholder="Post Code/zip" required>
                                <!-- <input type="email" class="form-control" name="email" placeholder="Email Address" required> -->
                                <!-- <input type="text"  class="form-control"  name="mobile" placeholder="Phone Number" required>  -->
                                COD<input  class="" type="radio" name="payment_type" value="COD">
                                    &nbsp&nbspPayU   <input type="radio" name="payment_type" value="Online">
                                    <input class="btn" name="upload" type="submit"> 
                            </div>
                            <!-- <input class="btn" name="upload" type="submit"> -->
                    </form>
                    <!-- <form>
                            <button class="<?php //echo //$type_class;?>">Payment Method<span id="span" style="float: right">+</span></button>
                            <div class="content">
                                <div class="payment">
                                    COD<input  type="radio" name="payment_type" value="COD">
                                    &nbsp;&nbsp;PayU   <input type="radio" name="payment_type" value="Online">
                                </div>
                                <input class="btn" name="upload" type="submit">
                            </div>
                    </form> -->
                </div>
             </div>
                <div class="col-21">
                    <div class="detail-cantainer">
                        <div class="high">
                           Your Order
                        </div>
                        <?php 
                        $Cart_total=0;
                         foreach($_SESSION['cart'] as $key=>$val)
                         { 
                             $productArr=get_product($con,'','',$key);
                             $pname=$productArr['0']['name'];
                             $pimage=$productArr['0']['image'];
                             $pprice=$productArr['0']['price'];
                             $qty=$val['qty'];
                             $Cart_total=$Cart_total+($pprice*$qty);
                         ?>
                        <div class="order">
                            <div class="order-tab">
                                <div class="order-img">
                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$pimage;?>" alt="">
                                    <div> 
                                        <span><?php echo $pname;?></span><br>
                                        &nbsp;&nbsp; <small>Qty:<?php echo $qty;?></small>&nbsp;
                                        <small>Unit Price:<?php echo $pprice;?></small> 
                                    </div>  
                                </div>
                                <div>
                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">Remove</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="total-price">
                            <h3>Total&nbsp:</h3> <span><?php echo $Cart_total;?></span>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require('g.footer.php'); 
?>