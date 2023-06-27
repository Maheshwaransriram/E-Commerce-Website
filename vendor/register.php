
<?php

    include_once "../shared/connection.php";
    session_start();

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repass'])){

        $uname=$_POST['username'];
        $upass=$_POST['password'];   
        $repass=$_POST['repass'];
        $_SESSION['login_status']=false;

        $res_obj=mysqli_query($conn,"select * from vendor where username='$uname'");

        $count = mysqli_num_rows($res_obj);

        if($count==0){
            if($repass==$upass){
                $status=mysqli_query($conn, "insert into vendor(username, password) values('$uname','$upass')");
                if($status){
                    $_SESSION['login_status']=true;
                    $res=mysqli_query($conn,"select * from vendor where username='$uname' and password='$upass'");
                    $row=mysqli_fetch_assoc($res);
                    $userid=$row['vendorid'];
                    $_SESSION['vendorid']=$userid;
                    header("refresh:1;url=/Intern_Project/vendor/view.php");
                    echo "<script>alert('Registered successful')</script>";
                }
                else{
                    echo "Error creating record" .mysqli_error($conn);
                }
            }
            else{
                echo "Password do not match";
            }
        }
        else{
            echo "<script>alert('Username already exist')</script>";
            header("refresh:1;url=/Intern_Project/vendor/home.html");
        }
  
    }
    else{
        echo "<br>No data" ;
    }

?>