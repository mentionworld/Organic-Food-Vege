<?php 
require('g.top.php');
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
else{
    $added_on=date('Y-m-d h:i:s');
    $result=mysqli_query($con,"insert into users(username,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')");
    if($result)
    echo"Inserted successfully";
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
          header('location:index.php');
          die();
        
      }
      else
      {
        echo '<script>alert("Please Enter Correct Login detail")</script>';
      }
   }
?>
<!------------Account page------>
<div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="temp/app1.jpg" width="80%">
                </div>
                <div class="col-2">
                    <div class="form-cantainer">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>
                        <form  method="post" action="" id="loginform" >
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                            <button class="btn" name="login" type="submit">Login</button>
                            <a href="#">Forgot password</a>
                        </form>
                    
                        <form method="post" action="" id="regiform" >
                            <input type="text"  class="form-control" name="username" placeholder="Username" required>
                            <input type="email" class="form-control" name="email" placeholder="email" required>
                            <input type="text" class="form-control" name="mobile" placeholder="contact Number" required>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                            <button class="btn" name="submit" type="submit">Login</button>
                            <a href="#">Forgot password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
require('g.footer.php');
?>