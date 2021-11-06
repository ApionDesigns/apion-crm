<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index.php");
}
?>
<?php
$servername = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
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
//BAIT STATUS 1
if (!empty($_POST['baitStat1'])) {
    $bait_Stat1 =  $_POST['baitStat1'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st1bait = '$bait_Stat1' WHERE id = '{$id}'");
    echo "working";
} else {
    echo "invoicing not working";
}
//BAIT DATE 1
if (empty($_POST['bait_d1'])) {
    echo "invoicing not working";
} else {
    $bait_d1 = $_POST['bait_d1'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date1 = '$bait_d1' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 2
if (!empty($_POST['bait_stat2'])) {
    $baitStat2 =  $_POST['bait_stat2'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st2bait = '$baitStat2' WHERE id = '{$id}'");
    echo "working";
} else {
    echo "invoicing not working";
}
//BAIT DATE 2
if (empty($_POST['bait_d2'])) {
    echo "invoicing not working";
} else {
    $bait_d2 = $_POST['bait_d2'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date2 = '$bait_d2' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 3
if (!empty($_POST['bait_stat3'])) {
    $baitStat3 =  $_POST['bait_stat3'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st3bait = '$baitStat3' WHERE id = '{$id}'");
    echo "working";
} else {
    echo "invoicing not working";
}
//BAIT DATE 3
if (empty($_POST['bait_d3'])) {
    echo "invoicing not working";
} else {
    $bait_d3 = $_POST['bait_d3'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date3 = '$bait_d3' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 4
if (empty($_POST['bait_stat4'])) {
    echo "invoicing not working";
} else {
    $baitStat4 =  $_POST['bait_stat4'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st4bait = '$baitStat4' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 4
if (empty($_POST['bait_d4'])) {
    echo "invoicing not working";
} else {
    $bait_d4 = $_POST['bait_d4'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date4 = '$bait_d4' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 5
if (empty($_POST['bait_stat5'])) {
    echo "invoicing not working";
} else {
    $baitStat5 =  $_POST['bait_stat5'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st5bait = '$baitStat5' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 5
if (empty($_POST['bait_d5'])) {
    echo "invoicing not working";
} else {
    $bait_d5 = $_POST['bait_d5'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date5 = '$bait_d5' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 6
if (empty($_POST['bait_stat6'])) {
    echo "invoicing not working";
} else {
    $baitStat6 =  $_POST['bait_stat6'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st6bait = '$baitStat6' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 6
if (empty($_POST['bait_d6'])) {
    echo "invoicing not working";
} else {
    $bait_d6 = $_POST['bait_d6'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date6 = '$bait_d6' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 7
if (empty($_POST['bait_stat7'])) {
    echo "invoicing not working";
} else {
    $baitStat7 =  $_POST['bait_stat7'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st7bait = '$baitStat7' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 7
if (empty($_POST['bait_d7'])) {
    echo "invoicing not working";
} else {
    $bait_d7 = $_POST['bait_d7'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date7 = '$bait_d7' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 8
if (empty($_POST['bait_stat8'])) {
    echo "invoicing not working";
} else {
    $baitStat8 =  $_POST['bait_stat8'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st8bait = '$baitStat8' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 8
if (empty($_POST['bait_d8'])) {
    echo "invoicing not working";
} else {
    $bait_d8 = $_POST['bait_d8'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date8 = '$bait_d8' WHERE id = '{$id}'");
    echo "working";
}
//BAIT STATUS 9
if (empty($_POST['bait_stat9'])) {
    echo "invoicing not working";
} else {
    $baitStat9 =  $_POST['bait_stat9'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET st9bait = '$baitStat9' WHERE id = '{$id}'");
    echo "working";
}
//BAIT DATE 9
if (empty($_POST['bait_d9'])) {
    echo "invoicing not working";
} else {
    $bait_d9 = $_POST['bait_d9'];
    $sql = mysqli_query($conn, "UPDATE bait_stations SET date9 = '$bait_d9' WHERE id = '{$id}'");
    echo "working";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>