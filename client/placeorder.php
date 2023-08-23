<?php

    include_once "../shared/connection.php";
    session_start();
    $userid=$_SESSION['userid'];
    if(isset($_GET['code']) && $_GET['code']=='active')
        {
        $pid=$_GET['pid'];
        $item=mysqli_query($conn,"insert into orders(userid,pid) values($userid,$pid)");

        if($item){
            echo "<script>alert('Order placed Successfully')</script>";
            header("refresh:1;url=vieworder.php");
        }
        else{
            echo "Error in sql syntax";
        }
    }
    else{
        $cart_result=mysqli_query($conn,"select * from cart where userid=$userid");
        while($cartrow=mysqli_fetch_assoc($cart_result)){
            $pid=$cartrow['pid'];
            mysqli_query($conn,"insert into orders(userid,pid) values($userid,$pid)");
        }

        $status=mysqli_query($conn,"delete from cart where userid=$userid");

        if($status){
            echo "<script>alert('Order placed Successfully')</script>";
            header("refresh:1;url=vieworder.php");
        }
        else{
            echo "Error in sql syntax";
        }
    }

?>
