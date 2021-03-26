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

$client = mysqli_real_escape_string($conn, $_GET['client_id']);
$sql2 = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = '{$client}'");
$row = mysqli_fetch_assoc($sql2);
$username = $_SESSION['username'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
//inspection reciever
$inspecrcvr = mysqli_real_escape_string($conn, $_POST['inrcvrtname']);
if (empty($inspecrcvr)) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspecrcver = '$inspecrcvr' WHERE client_id = '{$client}'");
    echo "working";
}
//lead technician
$leadtechnician = mysqli_real_escape_string($conn, $_POST['leadTech']);
if (empty($leadtechnician)) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET lead_tech = '$leadtechnician' WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for inspec date
if (empty($_POST['inspecDay'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspec_day = '$_POST[inspecDay]' WHERE client_id = '{$client}'");
    echo "working";
}
//inspection day recieved by technician
if (empty($_POST['inspecDayrcv'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspec_dayrcv = '$_POST[inspecDayrcv]' WHERE client_id = '{$client}'");
    echo "working";
}
//inspection day recieve return date
if (empty($_POST['inspecDayrcvrt'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET rtinspec_dayrcv = '$_POST[inspecDayrcvrt]' WHERE client_id = '{$client}'");
    echo "working";
}
//collect user input for expect inspec return date
if (empty($_POST['exinspecDayrt'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspec_exdayrt = '$_POST[exinspecDayrt]' WHERE client_id = '{$client}'");
    echo "working";
}
//collect user input for inspec return date
if (empty($_POST['inspecDayrt'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspec_dayrt = '$_POST[inspecDayrt]' WHERE client_id = '{$client}'");
    echo "working";
}

//collects user input for job day
if (empty($_POST['jobDay'])) {
    echo "not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET day_of_job = '$_POST[jobDay]' WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for invoice
if (empty($_POST['invoice_num'])) {
    echo "invoicing not working";
} else {
    $invoice = $_POST['invoice_num'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET invoice_id = $invoice WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for inspec date
if (empty($_POST['cost_price'])) {
    echo "price not working";
} else {
    $cost_priced = $_POST['cost_price'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET cost = $cost_priced WHERE client_id = '{$client}'");
    echo "working";
}
//lead technician
$rtrcvname = mysqli_real_escape_string($conn, $_POST['rturnrcvname']);
if (empty($rtrcvname)) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET rtinspec_rcver = '$rtrcvname' WHERE client_id = '{$client}'");
    echo "working";
}
header("location: edit.php?edit_id=$client");


$conn->close();
?> 