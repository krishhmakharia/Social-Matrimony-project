<?php 
include("db.php");

if (isset($_COOKIE["login"])) {
    $email = mysqli_real_escape_string($conn, $_COOKIE["login"]);
    $code = md5($email);

    if (isset($_REQUEST["id"]) && strlen($_REQUEST["id"]) > 0) {
        $user_code = mysqli_real_escape_string($conn, $_REQUEST["id"]);

        $q = mysqli_query($conn, "SELECT email FROM details WHERE code='$user_code'") or die(mysqli_error($conn));
        
        if ($row = mysqli_fetch_array($q)) {
            $user_email = $row[0];

            // Fixing operator precedence by adding parentheses
            $query = "UPDATE intrested 
                      SET blockBy='', intrest=1 
                      WHERE 
                        ((code='$code' AND email='$user_email') 
                        OR 
                        (code='$user_code' AND email='$email')) 
                        AND blockBy='$email'";

            if (mysqli_query($conn, $query)) {
                echo "success";
            } else {
                echo "failed";
            }
        }
    }
} else {
    header("Location: logout.php");
    exit(); // It's good practice to exit after header redirection
}
?>
