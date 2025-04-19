<?php
    include("db.php");
    //0-->Request sent 1-->Request accepted
    if(isset($_COOKIE["login"])){
        $email = mysqli_real_escape_string($conn,$_COOKIE["login"]);
        if(strlen($_REQUEST["id"])>0){
            $user_code=mysqli_real_escape_string($conn,$_REQUEST["id"]);
            $query="INSERT INTO intrested VALUES('$email','$user_code',0,'')";
            if(mysqli_query($conn,$query)){
                echo "success";
            }
            else{
                echo "error";
            }
        }
    }else{
        header("location:logout.php");
    }
?>