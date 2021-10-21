<?php
require('top.ad.php');
if(isset($_GET['type']) && $_GET['type'])
{
    $type=get_safe_value($con,$_GET['type']);
    if($type=='delete')
    {
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from users where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<main>
    <div class="dash-cards">
        <div class="card-single">
            <div class="card-body">
                <div>
                    <h5>Users</h5>
                </div>
            </div>
            <div class="card-footer "></div>
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
                                <th>name</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>date</th>
                                <th class="tstatus ">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=1;
                            while ($row=mysqli_fetch_assoc($res)) 
                            {
                       ?>
                            <tr>
                               <td class="serial"><?php echo $i; ?></td>
                               <td><?php  echo $row['id']; ?></td>
                               <td><?php echo $row['username']; ?></td>
                               <td><?php echo $row['email']; ?></td>
                               <td><?php echo $row['mobile']; ?></td>
                               <td><?php echo $row['added_on']; ?></td>
                                <td>
                                <?php 
                                   echo "&nbsp<span class='badge delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
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