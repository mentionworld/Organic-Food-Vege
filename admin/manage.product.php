<?php
require('top.ad.php');
$msg='';
$category_id='';
$name='';
$price='';
$qty='';
$image='';
$description='';
$image_required='require';
 if(isset($_GET['id']) && $_GET['id']!='')
   {
      $image_required='';
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from product where id='$id'");
      $check=mysqli_num_rows($res);
      if($check>0)
      {
         $row=mysqli_fetch_assoc($res);
         $categories_id=$row['cat_id'];
         $name=$row['name'];
         $price=$row['price'];
         $qty=$row['quantity'];
        $description=$row['description'];
      }
      else
      {
         header('location:product.php');
         die();
      }
   }
   
if(isset($_POST['submit']))
{  
   $category_id=get_safe_value($con,$_POST['cate_id']);
   $name=get_safe_value($con,$_POST['name']);
   $price=get_safe_value($con,$_POST['price']);
   $qty=get_safe_value($con,$_POST['qty']);
//   $image='';
   $description=get_safe_value($con,$_POST['description']);
   $res=mysqli_query($con,"select * from product where name='$name'");
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
                $msg="Product Already Exist";
            }
        }
        else
        {
            $msg="Product Already Exist";
        }
    }

    if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png'  &&  $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'))
    {
        $msg="Please Select only png ,jpg or jpeg image formate";
    }
    if($msg=='')
    {
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            if($_FILES['image']['name']!='')
            {
                $image=rand(11111111111,99999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
                $update_sql="update product set cat_id='$category_id',name='$name',price='$price',quantity='$qty',image='$image',description='$description' where id='$id'";
            }
            else
            {
                $update_sql="update product set cat_id='$category_id',name='$name',price='$price',quantity='$qty',description='$description' where id='$id'";     
            }
            mysqli_query($con,$update_sql);
        
        }
        else
        {
            echo $image=rand(111111111111,999999999999).'_'.$_FILES['image']['name'];
             move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
             mysqli_query($con,"insert into product(cat_id,name,price,quantity,image,description,status) values ('$category_id','$name','$price','$qty','$image','$description','1');");   
        
       }
        header('location:product.php');
       die();
    }
}

?>
        <main>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <div>
                            <h5> Add Product</h5>
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="frm">
                                    <div>
                                        <label for="name"> Categoty</label>
                                    </div>
                                    <div>
                                        <select name="cate_id" class="form-control" id="">
                                            <option value="disable"> Select Category</option>
                                            <?php
                                                $res=mysqli_query($con,"select id,cat_name from category order by cat_name asc");
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    if($row['id']==$categories_id)
                                                    {
                                                        echo "<option  selected value=".$row['id'].">".$row['cat_name']."</option>";
                                                    }
                                                    else
                                                    {
                                                    echo "<option value=".$row['id'].">".$row['cat_name']."</option>";
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div>
                                        <label for="name"> Product Name</label>
                                    </div>
                                    <div>
                                        <input type="text" name="name" id="" class="form-control" value="<?php  echo $name; ?>" placeholder="Product name">
                                    </div>
                                    <div>
                                        <label for="name">Price</label>
                                    </div>
                                    <div>
                                        <input type="text" name="price" id="" value="<?php  echo $price; ?>" class="form-control" placeholder="Price">
                                    </div>
                                    <div>
                                        <label for="name">Quantity</label>
                                    </div>
                                    <div>
                                        <input type="text" name="qty" id=""  value="<?php  echo $qty; ?>" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div>
                                        <label for="name">image</label>
                                    </div>
                                    <div>
                                        <input type="file" name="image" id="" class="form-control" <?php echo $image_required;?>>
                                    </div>
                                    <div>
                                        <label for="name">Decription</label>
                                    </div>
                                    <div>
                                        <textarea name="description" id="" placeholder="Description"  ><?php echo $description;?></textarea>
                                    </div>
                                    <div style="margin-top: 10px;" >  
                                        <label for="name">Add Banner</label>  
                                        <input type="checkbox" name="banner" value="" onclick="check()" id="banner"><?php echo $description;?></textarea>
                                    </div>
                                    <span id="ban" style="display: none;">
                                        <div>
                                            <label for="name">Banner Title</label>
                                            <input type="text" name="banner_title" id="" value="<?php  echo $qty; ?>" class="form-control" placeholder="Banner Title Name">
                                        </div>
                                        <div>
                                            <label for="name">Banner short Details</label>
                                        </div>
                                        <div>
                                            <textarea name="banner_desc" id=""  placeholder=" Banner Short Description" ><?php echo $description;?></textarea>
                                        </div>
                                    </span>
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
    <script>
     function check()
     {
     var change=document.getElementById('banner');
     console.log(change);
     
        if(change.checked==true)
        {   

            document.getElementById('ban').style.display="inline";
        }
        else{
            document.getElementById('ban').style.display="none";
            }
       
     }
 </script>
</body>
</html>