    <?php

        include_once "../shared/connection.php";
        session_start();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $qty = $_POST['quantity'];
        $vendorid = $_SESSION['vendorid'];

        $fname = $_FILES['pdtimg']['name'];

        $impath = "../shared/images/.$fname";

        move_uploaded_file($_FILES['pdtimg']['tmp_name'], $impath);

        $status = mysqli_query($conn, "insert into product(name, details, price, imgpath, quantity, vendorid) values('$name', '$details','$price', '$impath', '$qty', '$vendorid')");

        if ($status) {
            echo "<script>alert('Product successfully added!');</script>";
            header("refresh:1;url=add.php");
        } else {
            echo mysqli_error($conn);
        }
          

    ?>
