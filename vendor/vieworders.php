<?php


include_once "../shared/connection.php";
include "menu.php";

if(!isset($_SESSION['login_status']) || $_SESSION['login_status'] != "true") {
    echo "<script>alert('Please login to View Orders');</script>";
    header("refresh:1;url=/Intern_Project/vendor/home.html");
    exit();
}

$userid=$_SESSION['userid'];
if (isset($_GET["search"])) {
    $search_value = trim($_GET["search"]);
    $sql_result = mysqli_query($conn, "select * from orders join product on orders.pid=product.pid WHERE userid='$search_value'");
} else {
    $sql_result = mysqli_query($conn,"select * from orders join product on orders.pid=product.pid where vendorid=$userid");
}

echo "
<button class='btn btn-secondary m-3 sticky-top float-end'>Save</button>
<div class='order'>
    <div class='d-flex justify-content-center my-3'>
        <form class='input-group w-50'>
            <input type='text' class='form-control' placeholder='Search Order ID' aria-label='Search Order ID' name='search'>
            <button class='btn btn-secondary' type='submit'><i class='fa-solid fa-magnifying-glass'></i></button>
        </form>
    </div>
    
    <table class='table table-bordered border-secondary table-striped table-hover'>
        <thead class='table-dark sticky-top'>
            <tr>
                <th>Order ID</th>
                <th>Client ID</th>
                <th>Product Name</th>
                <th>Product ID</th>
                <th>Order Date & time</th>
                <th>Status</th>
            </tr>
        </thead>
        
        <tbody>";

while($row=mysqli_fetch_assoc($sql_result)){
    $orderid=$row["orderid"];
    $userid=$row["userid"];
    $productname=$row["name"];
    $pid=$row["pid"];
    $Ordered_date=$row['created_date'];

    echo "<tr>
        <td>$orderid</td>
        <td>$userid</td>
        <td>$productname</td>
        <td>$pid</td>
        <td>$Ordered_date</td>
        <td>
            <select name='status' class='form-select'>
                <option value='order'>Ordered</option>
                <option value='Packed'>Packed</option>
                <option value='Shipped'>Shipped</option>
                <option value='Delivered'>Delivered</option>
            </select>
        </td>
    </tr>";
}

echo "</tbody>
    </table>
</div>
<div class='p-5'></div>";

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Orders</title>
    <script src="https://kit.fontawesome.com/33a9757d42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Day 12/boot.css">
    <script src='dark-mode.js'></script>
    <style>
        .order{
            text-align: center;
            height: 800px;
            margin:50px;
            padding:70px;
            padding-top:20px;
        }
        
    </style>
</head>
<body style="font-family:inherit; margin:8px;">
    
</body>
</html>
