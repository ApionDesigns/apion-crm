<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: ../index");
}
?>
<?php
$servername = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_uid = '{$_SESSION['user_uid']}'");
$row = mysqli_fetch_assoc($sql);
$client = mysqli_real_escape_string($conn, $_GET['client']);
$del = mysqli_real_escape_string($conn, $_GET['del']);
$sqlCom = mysqli_query($conn, "SELECT * FROM residential UNION SELECT * FROM commercial WHERE client_id = '$client'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
if(!empty($_GET['client'])){
    $comment = $_POST['about'];
    $title = $_POST['title'];
    $sqlCom = mysqli_query($conn, "INSERT INTO comment (client_id, comment, title) VALUES ('$client', '$comment', '$title')");
    //echo "works";

}elseif(!empty($_GET['del'])){
    $sqlCom = mysqli_query($conn,"DELETE FROM comment WHERE id = $del");
    //echo "record deleted";

}elseif(empty($client)){ 
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    //echo"nope";
}
                                
header('Location: ' . $_SERVER['HTTP_REFERER']);


$conn->close();
?> 