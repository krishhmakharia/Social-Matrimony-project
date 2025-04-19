<?php
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
        $code=md5($email);
        if(isset($_GET["id"])){
            $album_code=mysqli_real_escape_string($conn,$_GET["id"]);
            $sn=0;
            $query=mysqli_query($conn,"SELECT MAX(sn) FROM galleries WHERE email='$email' AND album_code='$album_code'");
            if($row=mysqli_fetch_array($query)){
                $sn=$sn+$row[0];
            }
            $sn++;
            $target="gallery/$code/$album_code/$sn.jpg";
            if(move_uploaded_file($_FILES["pic"]["tmp_name"],$target)){
                if(mysqli_query($conn,"INSERT INTO galleries VALUES($sn,'$album_code','$email')")>0){
                    header("location:gallery.php?id=$album_code&success=1");
                }
                else{
                    header("location:gallery.php?id=$album_code&again=1");
                }
            }
            else{
                header("location:gallery.php?id=$album_code&imgError=1");

            }
        }
        else{
            header("location:gallery.php?id=$album_code&empty=1");
        }
    }
    else{
        header("location:index.php?cookieExpire=1");
    }
?>