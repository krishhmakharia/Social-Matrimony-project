<?php 
    include("db.php");
    if(empty($_POST["fname"])||empty($_POST["lname"])||empty($_POST["gender"])||empty($_POST["birth"])||empty($_POST["email"])||empty($_POST["pass"])||empty($_POST["repass"])||empty($_POST["caste"])||empty($_POST["religion"])||empty($_POST["occupation"])||empty($_POST["city"])||empty($_POST["state"])||empty($_POST["country"])){
        header("location:registration.php?empty=1");
    }
    else{
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $gender=$_POST["gender"];
        $birth=$_POST["birth"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $repass=$_POST["repass"];
        $caste=$_POST["caste"];
        $religion=$_POST["religion"];
        $occupation=$_POST["occupation"];
        $city=$_POST["city"];
        $state=$_POST["state"];
        $country=$_POST["country"];
        if($pass==$repass){
            $sn=1;
            $query=mysqli_query($conn,"SELECT MAX(sn) from details");
            if($row=mysqli_fetch_array($query)){
                $sn=$row[0];
            }
            $sn=$sn+1;
            $code=md5($email);
            $target="profilePic/$code.jpg";
            if(move_uploaded_file($_FILES["pic"]["tmp_name"],$target)){
                if(mysqli_query($conn,"INSERT INTO details VALUES($sn,'$code','$fname','$lname','$email','$pass','$gender','$caste','$religion','$occupation','$birth','','$city','$state','$country')")>0){
                    mkdir("gallery/$code");
                    header("location:index.php?Regsuccess=1");
                }
                else{
                    header("location:registeration.php?again=1");
                }
            }
            else{
                header("location:registration.php?imgError=1");
            }
        }
        else{
            header("location:registration.php?mismatch=1");
        }

    }
    
?>