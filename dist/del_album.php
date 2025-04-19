<?php
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
        $code=md5($email);
        if(strlen($_REQUEST["id"])>0){
            $album_code=mysqli_real_escape_string($conn,$_REQUEST["id"]);
            $query="SELECT * FROM galleries WHERE email='$email' AND album_code='$album_code'";
            while($row=mysqli_fetch_array(mysqli_query($conn,$query))){
                $sn=$row["sn"];
                $path="gallery/$code/$album_code/$sn.jpg";
                unlink($path);
                $q=mysqli_query($conn,"DELETE FROM galleries WHERE email='$email' AND album_code='$album_code' AND sn=$sn " );
            }
            mysqli_query($conn,"DELETE FROM album WHERE album_code='$album_code' AND email='$email' ");
            echo "success";
        }
        else{
            header("location:profile.index.php?error=1");
            exit();
        }
    }
    else{
        header("location:profile.index.php?cookieExpire=1");
        exit();
    }
?>