<?php
$hostname = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$username1 = mysqli_real_escape_string($conn, $_POST['unamel']);
$upw = mysqli_real_escape_string($conn, $_POST['upw']);
if (!empty($username1) && !empty($upw)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username1}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($upw);
        $enc_pass = $row['userpassword'];
        if ($user_pass === $enc_pass) {
            $status = "Online";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_uid = {$row['user_uid']}");
            if ($sql2) {
                session_start();
                $_SESSION['user_uid'] = $row['user_uid'];
                $_SESSION['user_name'] = $username1;
                //echo "success";                   
                header("location: Dashboard/index.php");
            } else {
                header("location: index.php");
            }
        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}
?>
