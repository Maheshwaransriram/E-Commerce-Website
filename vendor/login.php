<?php
    
    include_once "../shared/connection.php";
    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $uname = $_POST['username'];
        $upass = $_POST['password'];

        $_SESSION['login_status']=false;

        $name_obj=mysqli_query($conn,"select * from vendor where username='$uname'");

        $res_obj=mysqli_query($conn,"select * from vendor where username='$uname' and password='$upass'");

        $count_1 = mysqli_num_rows($name_obj);
        $count_2 = mysqli_num_rows($res_obj);

        if($count_1==0){
            echo "Username doesn't exist";
        }
       
        else if($count_2==0){
            echo "<script>alert(\"Password doesn't match\")</script>";
        }
        else{
            $_SESSION['login_status']=true;
            $row=mysqli_fetch_assoc($res_obj);
            $userid=$row['userid'];
            $_SESSION['userid']=$userid;
            header("refresh:1;url=/Intern_Project/vendor/view.php");
            echo "<script>alert('Login successful')</script>";
        }
    } 
    else {
        echo "No data";
    }
?>