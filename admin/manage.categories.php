
<?php
require("top.ad.php");
$msg='';
$categories='';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from category where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        $row=mysqli_fetch_assoc($res);
        $categories=$row['cat_name'];
    }
    else
    {
       header('location:ad.home.php');
        die();
    }
} 
if(isset($_POST['submit']))
{
    $categories=get_safe_value($con,$_POST['cname']);
    $res=mysqli_query($con,"select * from category where cat_name='$categories'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            $getdata=mysqli_fetch_assoc($res);
            if($id==$getdata['id'])
            {

            }
            else
            {
                $msg="Category Already Exist";
            }
        }
        else{
            $msg="Category Already Exist";
        }
    }
        if($msg=='')
        {
            if(isset($_GET['id']) && $_GET['id']!='')
            {
            mysqli_query($con,"update category set cat_name='$categories' where id='$id'");
             }
         else
            {
             mysqli_query($con,"insert into category(cat_name,status) values ('$categories','1')");
              
            }
             header('location:ad.home.php');
             die();
        }
}
?>
        <main>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <div>
                            <h5>Category </h5>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>
            <section class="recent ">
                <div class="activity-grid ">
                    <div class="activity-card ">
                        <div class="tabel-responsive ">
                            <form action="" method="post"> 
                                <div class="frm">
                                    <label for="name"> Category Name</label>
                                    <input type="text" name="cname" id="" class="form-control" placeholder="Category name" value="<?php echo $categories;?>"required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit">
                                        submit    
                                    </button>
                                </div>
                            </form>
                            <?php 
                    if($msg!='')
                    {?>
                        <div class="field-error"><?php echo $msg;?></div>
                   <?php }?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>