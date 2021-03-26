<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$username = mysqli_real_escape_string($conn, $_POST['unamel']);
$upw = mysqli_real_escape_string($conn, $_POST['upw']);
if (!empty($username) && !empty($upw)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($upw);
        $enc_pass = $row['userpassword'];
        if ($user_pass === $enc_pass) {
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_uid = {$row['user_uid']}");
            if ($sql2) {
                session_start();
                $_SESSION['user_uid'] = $row['user_uid'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['user_id'];
                //echo "success";                   
                header("location: home");
            } else {
                echo "Something went wrong. Please try again!";
            }
        } else {
            echo "Email or Password is Incorrect!";
        }
    } else {
        //echo "$email - This email not Exist!";
    }
} else {
    echo "All input fields are required!";
}
