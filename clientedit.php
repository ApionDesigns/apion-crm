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
///////////////////////////////
////inspection starts here/////
///////////////////////////////

//inspection reciever
if (empty($_POST['inrcvrtname'])) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET inspecrcver = '$_POST[inrcvrtname]' WHERE client_id = '{$client}'");
    echo "working";
}
//lead technician
if (empty($_POST['leadTech'])) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET lead_tech = '$_POST[leadTech]' WHERE client_id = '{$client}'");
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
//return reciever name
$rtrcvname = mysqli_real_escape_string($conn, $_POST['rturnrcvname']);
if (empty($rtrcvname)) {
    echo "invoicing not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET rtinspec_rcver = '$rtrcvname' WHERE client_id = '{$client}'");
    echo "working";
}

///////////////////////////////
////job order starts here//////
///////////////////////////////

//collects user input for job order recieved by
$rtjorcvname = mysqli_real_escape_string($conn, $_POST['jdrvr']);
if (empty($_POST['jdrvr'])) {
    echo "price not working";
} else {
    $sql2 = mysqli_query($conn, "UPDATE clients SET jorcver = $rtjorcvname WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for date recieved
if (empty($_POST['jDrcv'])) {
    echo "invoicing not working";
} else {
    $jDrcv = $_POST['jDrcv'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET jo_dayrcv = $jDrcv WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for job order date
if (empty($_POST['joderDay'])) {
    echo "price not working";
} else {
    $jodate = $_POST['joderDay'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET jo_day = $jodate WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for job order expected return date

if (empty($_POST['exjoDayrt'])) {
    echo "invoicing not working";
} else {
    $jortrcvname = $_POST['exjoDayrt'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET jo_exdayrt = '$rtrcvname' WHERE client_id = '{$client}'");
    echo "working";
}
//collects user input for job order date return
if (empty($_POST['joderDayrt'])) {
    echo "invoicing not working";
} else {
    $rtrcvname = $_POST['joderDayrt'];
    $sql2 = mysqli_query($conn, "UPDATE clients SET jo_dayrt = '$rtrcvname' WHERE client_id = '{$client}'");
    echo "working";
}
header("location: edit.php?e=$client");


$conn->close();
?> 