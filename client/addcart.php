<?php

    $pid=$_GET['pid'];
    session_start();
    if($_SESSION['login_status']==false){
        echo "<script>alert('Login to buy products')</script>";
        header("refresh:1;url=home.html");
    }
    else{
        $userid=$_SESSION['userid'];

        include_once "../shared/connection.php";

        $cmd = "insert into cart(userid, pid) values($userid, $pid)";

        $status = mysqli_query($conn,$cmd);
        
        if($status){
            echo "<script>alert('Added to Cart')</script>";
            header("refresh:0.5;url=view.php");
        }
        else{
            echo "Error to SQL syntax";
        }
    }

?>