<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: ../index");
}
?>
<?php
$hostname = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (isset($_SESSION['user_uid'])) {
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout']);
    if (isset($logout_id)) {
        $status = "Offline";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE user_uid=$_SESSION[user_uid];");
        session_destroy();
        //echo "nope4";
        header("location: ../index");
    } else {
        //echo "nope3";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    //echo "nope2";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//echo "nope1";
//header('Location: ' . $_SERVER['HTTP_REFERER']);
$conn->close();