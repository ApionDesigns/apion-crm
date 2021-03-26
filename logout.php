<?php
session_start();
if (isset($_SESSION['user_uid'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_uid={$_GET['logout_id']}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: index");
        }
    } else {
        header("location: home.php");
    }
} else {
    header("location: index.php");
}
