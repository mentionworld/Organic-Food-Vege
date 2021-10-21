
<?php
   require('connection.inc.php');
   require('function.inc.php');
   $msg='';

   if(isset($_POST['submit']))
   {
      $username=get_safe_value($con,$_POST['email']);
      $password=get_safe_value($con,$_POST['password']);
      $sql="select * from admin where username='".$username."'and password='".$password."'";
      $res=mysqli_query($con,$sql);
      $count=mysqli_num_rows($res);
      if($count>0)
      { 
         $_SESSION['ADMIN_LOGIN']='yes';
         $_SESSION['ADMIN_USERNAME']=$username;
         header('location:ad.home.php');
         die();
      }
      else
      {
         $msg="Please enter correct login details";
      }

   }
?>
<html>
<head>
    <title>
        Organic Vegetable
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>Login</h2>
                    <form method="post">
                        <input type="email" name="email" class="input-box" placeholder="your email Id" required>
                        <input type="password" name="password" class="input-box" placeholder="password" required>
                        <button type="submit"  name="submit" class="submit-btn">Submit</button>
                        <!----<input type="checkbox"><span>Remember me</span>-->
                    </form>
                    <?php 
                    if($msg!='')
                    {?>
                        <div class="field-error"><?php echo $msg;?></div>
                   <?php }?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>