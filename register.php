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
$u_role = mysqli_real_escape_string($conn, $_POST['role']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$ran_id = rand(time(), 100000000);
$sql3 = mysqli_query($conn, "SELECT * FROM users");
$row3 = mysqli_fetch_assoc($sql3);
$user = $row3['username'];
if (!empty($user_name) && !empty($first_name) && !empty($last_name) && !empty($uemail) && !empty($password)) {
    $encrypt_pass = md5($password);
    $sql = mysqli_query($conn, "INSERT INTO users (user_uid, username, first_name, last_name, email, urole, userpassword) 
    VALUES ('$ran_id','$user_name','$first_name', '$last_name', '$uemail', '$u_role', '$encrypt_pass')");
    $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, status)
    VALUES ({$ran_id}, '{$first_name}','{$last_name}', '{$uemail}', '{$encrypt_pass}', '{$status}')");
    header("location: usercreate");
} else {
    echo "$uemail - This email already exist!";
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatapp";

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
$u_role = mysqli_real_escape_string($conn, $_POST['role']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$ran_id = rand(time(), 100000000);
$sql3 = mysqli_query($conn, "SELECT * FROM users");
$row3 = mysqli_fetch_assoc($sql3);
$user = $row3['username'];
if (!empty($user_name) && !empty($first_name) && !empty($last_name) && !empty($uemail) && !empty($password)) {
    $encrypt_pass = md5($password);
    $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, status)
    VALUES ({$ran_id}, '{$first_name}','{$last_name}', '{$uemail}', '{$encrypt_pass}', '{$status}')");
    header("location: usercreate");
} else {
    echo "$uemail - This email already exist!";
}

$conn->close();

