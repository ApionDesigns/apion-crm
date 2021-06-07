<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index.php");
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM bait_stations WHERE id = '{$id}'");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
//bait station name
if (empty($_POST['station_name'])) {
    echo "invoicing not working";
} else {
    $bait_stat_name = $_POST['station_name'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET Station_name = '$bait_stat_name' WHERE id = '{$id}'");
    echo "working";
}
//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>