<?php
require('g.top.php');
if(isset($_POST['submit']))
{
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $query=get_safe_value($con,$_POST['text']);
    $added_on= date('Y-m-d h:i:s');
    $result=mysqli_query($con,"insert into contact_us(username,email,mobile,comment,added_on) values('$name','$email','$mobile','$query','$added_on')");
    if($result)
    {
        echo '<script>alert("Responsed Submitted !!!!!")</script>';
        echo'<script> location.href="contact.php";</script>';
    }
 }
?>
<div class="container">
    <h2>Contact Us</h2>
    <div class="row">
        <div class="col-2">
            <img src="temp/Googlemap-600x551.jpg" alt="" width="100%">
        </div>
        <div class="col-2">
            <div class="col-2-1">
                <div class="fnt">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="col-c">
                    <h1>Address</h1>
                    <p>Lorem ipsum dolor sit </p>
                </div>
            </div>
            <div class="col-2-1">
                <div class="fnt">
                    <i class="fa fa-briefcase"></i>
                </div>
                <div class="col-c">
                    <h1>Office Timing</h1>
                    <p>Lorem ipsum dolor sit </p>
                </div>
            </div>
            <div class="col-2-1">
                <div class="fnt">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="col-c">
                    <h1>Contact us</h1>
                    <p>Lorem ipsum dolor sit </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="categories">
    <form method="post">
        <div class="contact">
            <h1> Send Mail</h1>
            <div class="col-m">
                <div class="col-f">
                    <input type="text" name="name" placeholder="name*" id="" required>
                </div>
                <div class="col-f">
                    <input type="email" name="email" placeholder="email*" id="" required>
                </div>
                <div class="col-f">
                    <input type="text" name="mobile" placeholder="mobile*" id="" required>
                </div>
            </div>
            <div class="col-text">
                <div class="col-t">
                    <textarea type="text" name="text" placeholder="message*" id="" required></textarea>
                </div>
            </div>
            <div class="col-f">
            <button class="submit" name="submit" type="submit">submit</button>
            </div>      
        </div>
    </form>
</div>
<?php
require('g.footer.php');
?>