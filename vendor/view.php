<?php

    include "menu.php";
    include_once "../shared/connection.php";

    $sql_result = mysqli_query($conn, "select * from product");

    echo "<div class='container'>";

    while($row = mysqli_fetch_assoc($sql_result)){

        $pid=$row['pid'];
        $name=$row['name'];
        $impath=$row['imgpath'];
        $price=$row['price'];
        $details=$row['details'];
        $stock=$row['quantity'];

        echo "
            <div class='card'>
                <div class='title'>$name</div>
                <img src='$impath'>
                <div class='price'>COST : &#8377 $price</div>
                <div class='price'>STOCK : $stock</div>
                <div class='details'>$details</div>
                <div class='footer'>";
        
        if (isset($_SESSION['vendorid'])) {
            echo "
                    <button class='btn'>Edit</button>
                    
                    <div class='flex-btn'>
                    </div>
                    <a href='deleteproduct.php?pid=$pid'>
                        <button class='btn'>Delete</button>
                    </a>";
        } else {
            echo "
                    <button class='btn' onclick='alert(\"Please login to Edit products.\")'>Edit</button>
                    <div class='flex-btn'>
                    </div>
                    <button class='btn' onclick='alert(\"Please login to delete products.\")'>Delete</button>";
        }

        echo "
                </div>
            </div>";
    }

    echo "</div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Product View</title>
    <link rel='stylesheet' href='view.css'>
    <script src='dark-mode.js'></script>
</head>
<body>

</body>
</html>


