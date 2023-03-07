<?php

    include_once "../shared/connection.php";

    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
        $status=mysqli_query($conn,"delete from cart where cartid=$pid");

        if($status){
            echo "Product deleted successfully";
            header("location:viewcart.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }
    if(isset($_GET['orderid'])){
        $pid=$_GET['orderid'];
        $status=mysqli_query($conn,"delete from orders where orderid=$pid");

        if($status){
            echo "Product deleted successfully";
            header("location:vieworder.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }

    

?>
