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
$sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$_SESSION['username']}'");
$row = mysqli_fetch_assoc($sql);
$username = $_SESSION['username'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//collects user input
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$tel = mysqli_real_escape_string($conn, $_POST['tel']);
$job_type = $_POST['jtype'];
$street_address = mysqli_real_escape_string($conn, $_POST['street_address']);
$city_address = mysqli_real_escape_string($conn, $_POST['city_address']);
$contact = $_POST['call'];
$ran_id = rand(time(), 100000000);
$sql = mysqli_query($conn, "INSERT INTO clients (client_id, first_name, last_name, email, tel, street_address, city_address, job_type, contact, created_by) 
    VALUES ('$ran_id','$first_name', '$last_name', '$email', '$tel', '$street_address', '$city_address', '$job_type', '$contact', '$username')");
header("location: home");


$conn->close();
?> 