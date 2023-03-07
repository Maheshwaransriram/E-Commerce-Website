<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/33a9757d42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    
</body>
</html>
<?php
session_start();

if(isset($_SESSION['login_status']) && $_SESSION['login_status'] == "true"){

    echo '
    <nav>
        <a href="home.html" onclick="event.preventDefault(); document.getElementById(\'logout-form\').submit();">
            Logout
        </a>
        <form id="logout-form" action="logout.php" method="POST">
            <input type="hidden" name="logout" value="true">
        </form>              
        <a href="vieworders.php">View Orders</a>
        <a href="view.php">View Product</a>
        <a href="add.php">Add Product</a>
        <a id="dark-toggle"> <i class="fa-solid fa-circle-half-stroke"></i></a>
    </nav>';
} else {

    echo '
    <nav>
        <a href="home.html">Login</a>
        <a href="vieworders.php">View Orders</a>
        <a href="view.php">View Product</a>
        <a href="add.php">Add Product</a>
        <i class="fa-solid fa-regular-half-stroke"></i>
    </nav>';
}
?>
