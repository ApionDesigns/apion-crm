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
$tax = mysqli_query($conn,"SELECT * FROM admins");
$row = mysqli_fetch_assoc($sql);
$row2 = mysqli_fetch_assoc($tax);
$username = $_SESSION['username'];
$id = mysqli_real_escape_string($conn, $_GET['id']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    if(empty($_POST["tax"])){
        //$tx = mysqli_query($conn, "UPDATE admins SET tax = '$tax'");
    }elseif(!empty($row2["tax"])){
        $tax = $_POST["tax"];
        $tx = mysqli_query($conn, "UPDATE admins SET tax = '$tax'");
    }else{
        //$tx = mysqli_query($conn, "INSERT INTO admins SET tax = '$tax'");
    }
    if(!empty($_POST["jName"])){
        $jobName = $_POST["jName"];
        $newJobName = (explode(",",$jobName));
        foreach ($newJobName as $value) {
            $sql = mysqli_query($conn,"INSERT INTO jCat SET JName = '$value'");
        }
    }else{
        //$sql = mysqli_query($conn,"INSERT INTO jCat SET JName = '$jobName'");
    }
    if(!empty($id)){
        $sql = mysqli_query($conn,"DELETE FROM jCat WHERE id=$id");
        echo "delete successful";
    }else{
        //do nothing
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>