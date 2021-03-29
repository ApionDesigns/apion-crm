<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//collects user input
$user_name = mysqli_real_escape_string($conn, $_POST['uname']);
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$uemail = mysqli_real_escape_string($conn, $_POST['uemail']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$ran_id = rand(time(), 100000000);
$sql3 = mysqli_query($conn, "SELECT * FROM users");
$row3 = mysqli_fetch_assoc($sql3);
$user = $row3['username'];
if (!empty($user_name) != $user && !empty($first_name) && !empty($last_name) && !empty($uemail) && !empty($password)) {
    $encrypt_pass = md5($password);
    $sql = mysqli_query($conn, "INSERT INTO users (user_uid, username, first_name, last_name, email, userpassword) 
    VALUES ('$ran_id','$user_name','$first_name', '$last_name', '$uemail', '$encrypt_pass')");
    header("location: index");
} else {
    echo "$uemail - This email already exist!";
}

$conn->close();
