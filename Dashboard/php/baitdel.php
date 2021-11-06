<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>
<?php
$servername = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_SESSION['username']}'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}

$id = $_GET['id'];
$sql2 = "DELETE FROM bait_stations WHERE id = '{$id}'";
$data = mysqli_query($conn, $sql2);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
