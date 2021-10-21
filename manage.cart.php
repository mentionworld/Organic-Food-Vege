<?php
require("connect.php");
require("g.function.inc.php");
require('add_to_card.inc.php');

    $pid=get_safe_value($con,$_POST['pid']);
    $type=get_safe_value($con,$_POST['type']);
    $qty=get_safe_value($con,$_POST['qty']);

    $obj=new add_to_cart();
    if($type=='add')
    {
        $obj->addProduct($pid,$qty);
    }
    if($type=='update')
    {
        $obj->updateProduct($pid,$qty);
    }
    if($type=='remove')
    {
        $obj->removeProduct($pid);
    }
    
    echo $obj->totalProduct();
?>