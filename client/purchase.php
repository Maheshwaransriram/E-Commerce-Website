<?php

    include "menu.php";
    if(isset($_GET['total'])){
        $total=$_GET['total'];
    }
    if(isset($_GET['price'])){
        $total=$_GET['price'];
    }
    if(isset($_GET['code'])){
        $code=$_GET['code'];
    }
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="/Day 12/boot.css">
    <script src='dark-mode.js'></script>
    <style>
        
    </style>
</head>
<body>
<div class='modal-dialog d-flex align-items-center justify-content-center vh-100'>
    <div class='modal-content'>
      <div class='modal-header p-3'>
        <h5 class='modal-title' id='staticBackdropLabel'>Select a payment method</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <div class='form-control p-3'>
            <h4><?php echo "Total : $total"?></h4>
        </div>
        <div class='form-control p-2 mt-1'>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' disabled>
                <label class='form-check-label' for='flexRadioDefault1'>
                <b>UPI/Netbanking</b><br>
                <p>Not available</p>
                </label>
            </div>
        </div>
        <div class='form-control p-2 mt-1'>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' disabled>
                <label class='form-check-label' for='flexRadioDefault1'>
                <b>Pay with Debit/Credit/ATM Cards</b><br>
                <p>Not available</p>
                </label>
            </div>
        </div>
        <div class='form-control p-2 mt-1'>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' disabled>
                <label class='form-check-label' for='flexRadioDefault1'>
                <b>EMI</b><br>
                <p>Not available</p>
                </label>
            </div>
        </div>
        <div class='form-control p-4 mt-1'>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1' checked>
                <label class='form-check-label' for='flexRadioDefault1'>
                <b>Cash On Delivery/Pay On Delivery</b><br>
                </label>
            </div>
        </div>
        </div>
      <div class='modal-footer p-2'>
        <a href='placeorder.php?code=<?php echo $code ?>&pid=<?php echo $pid ?>' class='w-100'>
            <button type='submit' class='btn btn-primary form-control'>Buy Now</button>
        </a>
      </div>
    </div>
  </div>
</body>
</html>

