<?php

    $conn = new mysqli("localhost","root","root","intern_demo");

    if($conn->connect_error){
        echo "Connection Failed";
        die;
    }
    //echo "connection success";

?>