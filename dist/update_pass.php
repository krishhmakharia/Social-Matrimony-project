<?php
    include("db.php");
    if(isset($_COOKIE["login"])){
        $email = mysqli_real_escape_string($conn,$_COOKIE["login"]);
        if(isset($_POST["cp"]) && isset($_POST["np"]) && isset($_POST["rp"])){
            $cp = mysqli_real_escape_string($conn,$_POST["cp"]);
            $np = mysqli_real_escape_string($conn,$_POST["np"]);
            $rp = mysqli_real_escape_string($conn,$_POST["rp"]);
            if($np == $rp){
                $query = mysqli_query($conn,"SELECT * FROM details WHERE email='$email' ");
                if($row=mysqli_fetch_array($query)){
                    if($row["password"] == $cp ){
                        if(mysqli_query($conn,"UPDATE details SET password='$np' WHERE email='$email' ")){
                            header("location:change_pass.php?success=1");
                        }
                        else{
                            header("location:change_pass.php?error=1");
                        }       
                    }
                    else{
                        header("location:change_pass.php?invalid=1");
                    }
                }
            }
            else{
                header("location:change_pass.php?mismatch=1");
            }
        }
        else{
            header("loaction:change_pass.php?empty=1");
        }
    }
    else{
        header("location:logout.php");
    }
?>