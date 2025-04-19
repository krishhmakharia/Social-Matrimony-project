<?php 
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
        $code=md5($email);
        if(strlen($_REQUEST["id"])>0){
            $user_code=mysqli_real_escape_string($conn,$_REQUEST["id"]);
            $q=mysqli_query($conn,"SELECT email FROM details WHERE code='$user_code'");
            if($r=mysqli_fetch_array($q)){
                $user_email=$r[0];
                $query="DELETE FROM intrested WHERE (code='$code' AND email='$user_email') OR (code='$user_code' AND email='$email') AND intrest=1 ";
                if(mysqli_query($conn,$query)){
                    echo "success";
                }
                else{
                    echo "failed";
                }
            }
            
        }
    }else{
        header("location:logout.php");
    }
?>