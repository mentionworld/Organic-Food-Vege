<?php
require("top.ad.php");
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=get_safe_value($con,$_GET['type']);
    if($type=='status')
    {
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='active')
        {
            $status='1';
        }
        else{
            $status='0';
        }
        $update_status_sql="update category set status='$status' where id='$id'"; 
        mysqli_query($con,$update_status_sql);
    }
    if($type=='delete')
    {
      $id=get_safe_value($con,$_GET["id"]);
       $delete_sql="Delete from category where id='$id'";
      mysqli_query($con,$delete_sql);  
        
    }
}
$sql="select * from category order by cat_name asc ";
$res=mysqli_query($con,$sql);
?>    
 <main>
        <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <div>
                            <h5>Account Balance</h5>
                            <a href="manage.categories.php">
                                <h4>Add category</h4>
                            </a>
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
                            <table>
                                <thead>
                                    <tr>
                                        <th class="sg ">#</th>
                                        <th>id</th>
                                        <th>category</th>
                                        <th class="tstatus ">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while($row=mysqli_fetch_assoc($res))
                                {  
                                ?>
                                    <tr>
                                        <td class="sg "><?php echo $i;?></td>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['cat_name'];?></td>
                                         <td class="status">
                                        <?php 
                                          if($row['status']==1)
                                          {
                                             echo "<span class='badge success'><a  class='change' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp";
                                          }
                                          else
                                          {
                                             echo "<span class='badge pending'><a  class='change' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp";
                                          }
                                             echo "<span class='badge edit'><a  class='change' href='manage.categories?id=".$row['id']."'>Edit</a></span>";
                                           echo"&nbsp<span class='badge warning'><a  class='change' href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
                                           ?>
                                          </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>