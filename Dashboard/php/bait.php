<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>
<?php
$hostname = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$edit = mysqli_real_escape_string($conn, $_GET['e']);
$sql = mysqli_query($conn, "SELECT * FROM bait_stations");
$cli = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = '{$edit}'");
$row2 = mysqli_fetch_assoc($cli);
$client_id = $row2['client_id'];
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);

}
$name = $_POST['bait_st_name'];
$sql = "INSERT INTO bait_stations (Station_name, client_id)
VALUES ('$name', '$client_id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location: edit.php?e=$client_id#bait");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>