<?php
session_start();
include "php/config.php";

$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$sql = "SELECT * FROM residential WHERE (first_name LIKE '%{$searchTerm}%') OR (last_name LIKE '%{$searchTerm}%') UNION SELECT * FROM commercial WHERE (business_name LIKE '%{$searchTerm}%') LIMIT 7";
$output = "";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    include_once "data.php";
} elseif (!mysqli_num_rows($query)) {
    $output .= '<div class="px-5 py-1">No user found</div>';
} else {
    $output .= '<div class="px-5 py-1">No user found</div>';
}
echo $output;
