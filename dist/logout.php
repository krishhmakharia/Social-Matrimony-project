<?php 
    include("db.php");
    setcookie("login","",time()-1);
    header("Location: index.php");
    exit();
?>