<?php

    include_once "../shared/connection.php";
    include "menu.php";

    $code='inactive';
    // Check if user is logged in
    if(!isset($_SESSION['login_status']) || $_SESSION['login_status'] != "true") {
        echo "<script>alert('Please login to buy products');</script>";
        header("refresh:1;url=/Intern_Project/client/home.html");
        exit();
    }
    else{
        $userid=$_SESSION['userid'];

        $cmd = ("select * from cart join product on cart.pid=product.pid where userid=$userid");

        $sql_result=mysqli_query($conn,$cmd);
        $total=0;
        $cartid=0;

        echo "<div class='container'>";
        echo "<div class='left'>";

        while($row = mysqli_fetch_assoc($sql_result)){

            $pid=$row['pid'];
            $name=$row['name'];
            $impath=$row['imgpath'];
            $price=$row['price'];
            $details=$row['details'];
            $stock=$row['quantity'];
            $cartid=$row['cartid'];
            $total=$total+$price;
            

            echo"
                <div class='card'>
                <div class='title'>$name</div>
                <img src='$impath'>
                <div class='price'>COST : &#8377 $price</div>
                <div class='details'>$details</div>
                <div class='footer'>
                <a href='deleteproduct.php?pid=$cartid'>
                    <button class='btn'>Remove from Cart</button>
                </a>
                </div>
                </div>";
        }

        echo "</div>

        <div class='right'>
            <div class='icon'>
            <i class='fa-sharp fa-solid fa-cart-shopping'></i><br>
            </div>
            Total :  &#8377 $total
            <a href='purchase.php?total=$total&code=$code&pid=$cartid'>
            <button class='btn1'>Place the Order</button>
            </a>
            </div>

        </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/33a9757d42.js" crossorigin="anonymous"></script>
    <title>View Cart</title>
    <link rel="stylesheet" href="view.css">
    <script src='dark-mode.js'></script>
</head>
<body>
    
</body>
</html>
