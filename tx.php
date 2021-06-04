<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>
<?php
// define variables and set to empty values
$tax = $_POST["tax"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($row_tax['tax'])){
        $tx = "INSERT INTO admins SET tax = '$tax'";
    }else{
        $tx = "INSERT INTO admins SET tax = '$tax'";
    }
}
?>