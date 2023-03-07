<?php
    include "menu.php";
    if(!isset($_SESSION['login_status']) || $_SESSION['login_status'] != "true") {
        echo "<script>alert('Please login to Add Products');</script>";
        header("refresh:1;url=/Intern_Project/vendor/home.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/Day 12/boot.css">
    <script src='dark-mode.js'></script>
</head>
<body class="bg-light" style="margin:8px; font-family:inherit;">
    <div class="d-flex vh-100 m-4 w-50">
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="w-75">
            <fieldset>
                <legend >Add Items</legend>

                <label for="product_name" class="form-label"> Product Name</label>
                <input class="form-control" type="text" name="name" id="product_name" autocomplete>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="product_price" class="form-label mt-2"> Price</label>
                        <input class="form-control" type="text" name="price" id="product_price">
                    </div>

                    <div class="col-md-6">
                        <label for="product_quantity" class="form-label mt-2"> Quantity</label>
                        <input class="form-control" type="number" name="quantity" id="product_quantity">
                    </div>
                </div>

                <label for="product_details" class="form-label mt-2">Description</label>
                <textarea class="form-control" name="details" id="product_details" cols="20" rows="5" autocomplete></textarea>

                <input class="form-control mt-3" type="file" name="pdtimg">

                <div class="d-flex justify-content-end">
                    <input type="submit" value="Upload" class="btn btn-secondary mt-3">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
