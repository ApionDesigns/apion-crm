<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: ../index");
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_uid = '{$_SESSION['user_uid']}'");
$row = mysqli_fetch_assoc($sql);
$client = mysqli_real_escape_string($conn, $_POST['client']);
$sqlRes = mysqli_query($conn, "SELECT * FROM residential WHERE client_id = '$client'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//collects user input
$job_type = $_POST['jtype'];
$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $contact = $_POST['call'];
    $street_address =  $_POST['street_address'];
    $city_address = $_POST['city_address'];  
$sql2 = mysqli_query($conn, "SELECT * FROM jCat WHERE JName = '{$job_type}'");
$row2 = mysqli_fetch_assoc($sql2);
$row3 = mysqli_fetch_assoc($sqlRes);
$nCount = $row2['jCount'] + 1;
$ran_id = rand(time(), 100000000);
if(!empty($client)){
    $name = $row3['first_name'];
    $lastName = $row3['last_name'];
    $mail = $row3['email'];
    $tel = $row3['tel'];
    $stAd = $row3['street_address'];
    $ctAd = $row3['city_address'];
    $contact = $row3['contact'];

    $sql3 = mysqli_query($conn, "INSERT INTO residential (client_id, first_name, last_name, email, tel, street_address, city_address, job_type, contact, created_by) 
    VALUES ('$ran_id','$name', '$lastName', '$mail', '$tel', '$stAd', '$ctAd', '$job_type', '$contact', '$username')");
    $sql2 = mysqli_query($conn, "UPDATE jCat SET jCount = '$nCount' WHERE JName = '{$job_type}'");
}elseif(empty($client)){ 
    $sql = mysqli_query($conn, "INSERT INTO residential (client_id, first_name, last_name, email, tel, street_address, city_address, job_type, contact, created_by) 
    VALUES ('$ran_id','$first_name', '$last_name', '$email', '$tel', '$street_address', '$city_address', '$job_type', '$contact', '$username')");
    $sql2 = mysqli_query($conn, "UPDATE jCat SET jCount = '$nCount' WHERE JName = '{$job_type}'");
}
                                
header('Location: ' . $_SERVER['HTTP_REFERER']);


$conn->close();
?> 