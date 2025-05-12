<?php 
    include ("db.php");
    if(empty($_POST['email'])||empty($_POST['password'])){
        header("location:index.php?modal=open&empty=1");   
    }
    else{
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query=mysqli_query($conn," SELECT * FROM details WHERE email='$email'");
        if($row=mysqli_fetch_array($query)){
            if($row['email']==$email){
                if($row['password']==$password){
                    setcookie("login",$email,time()+60*60*24);
                    header("location:profile.php");
                }
                else{
                    header("location:index.php?modal=open&invalidpass=1");
                }
            }
            else{
                header("location:index.php?modal=open&invalid=1");
            }
        }
        else{
            header("location:index.php?error=1");
        }
    }
?>