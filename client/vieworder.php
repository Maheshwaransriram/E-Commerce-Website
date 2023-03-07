<?php

    include "menu.php";
    include_once "../shared/connection.php";


    // Check if user is logged in
    if(!isset($_SESSION['login_status']) || $_SESSION['login_status'] != "true") {
        echo "<script>alert('Please login to buy products');</script>";
        header("refresh:1;url=/Intern_Project/client/home.html");
        exit();
    }
    else{
        $userid=$_SESSION['userid'];

        $cmd = ("select * from orders join product on orders.pid=product.pid where userid=$userid");

        $sql_result=mysqli_query($conn,$cmd);
        $total=0;

        echo "<div class='container'>";

        while($row = mysqli_fetch_assoc($sql_result)){

            $pid=$row['pid'];
            $name=$row['name'];
            $impath=$row['imgpath'];
            $price=$row['price'];
            $details=$row['details'];
            $stock=$row['quantity'];
            $orderid=$row['orderid'];

            echo"
                <div class='card'>
                <div class='title'>$name</div>
                <img src='$impath'>
                <div class='price'>COST : &#8377 $price</div>
                <div class='details'>$details</div>
                <div class='footer'>
                <a href='deleteproduct.php?orderid=$orderid'>
                    <button class='btn'>Cancel the Order</button>
                </a>
                </div>
                </div>";
        }

        echo "</div>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="view.css">
    <script src='dark-mode.js'></script>
</head>
<body>
    
</body>
</html>
