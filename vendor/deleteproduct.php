<?php

    include_once "../shared/connection.php";

    $pid=$_GET['pid'];

    $status=mysqli_query($conn,"delete from product where pid=$pid");

    if($status){
        echo "Product deleted successfully";
        header("location:view.php");
    }
    else{
        echo mysqli_error($conn);
    }

?>