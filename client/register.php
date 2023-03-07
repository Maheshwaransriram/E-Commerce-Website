
<?php

    include_once "../shared/connection.php";
    session_start();

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repass'])){

        $uname=$_POST['username'];
        $upass=$_POST['password'];   
        $repass=$_POST['repass'];
        $_SESSION['login_status']=false;

        $res_obj=mysqli_query($conn,"select * from user where username='$uname'");

        $count = mysqli_num_rows($res_obj);

        if($count==0){
            if($repass==$upass){
                $status=mysqli_query($conn, "insert into user(username, password) values('$uname','$upass')");
                if($status){
                    $_SESSION['login_status']=true;
                    $res=mysqli_query($conn,"select * from client where username='$uname' and password='$upass'");
                    $row=mysqli_fetch_assoc($res);
                    $userid=$row['userid'];
                    $_SESSION['userid']=$userid;
                    header("refresh:1;url=/Intern_Project/client/view.php");
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
            header("refresh:1;url=/Intern_Project/client/home.html");
        }

    }
    else{
        echo "<br>No data" ;
    }

?>