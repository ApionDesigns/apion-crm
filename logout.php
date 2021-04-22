<?php
session_start();
if (isset($_SESSION['user_uid'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout']);
    if (isset($logout_id)) {
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_uid=$logout_id");
        session_unset();
        session_destroy();
    } else {
        header("location: home.php");
    }
} else {
    header("location: index.php");
}
header("location: index.php");
