<?php
session_start();
include_once "config.php";

$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$sql = "SELECT * FROM clients WHERE  (client_id LIKE '%{$searchTerm}%') OR (last_name LIKE '%{$searchTerm}%') OR (first_name LIKE '%{$searchTerm}%') ";
$output = "";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    include_once "data.php";
} elseif (!mysqli_num_rows($query)) {
    $output .= 'No user found';
} else {
    $output .= 'No user found';
}
echo $output;