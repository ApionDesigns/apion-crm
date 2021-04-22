<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC");
$query = $conn->query("SELECT * FROM clients ORDER BY created_at DESC");
$result = $conn->query("SELECT * FROM clients");
$pay = $conn->query("SELECT * FROM clients WHERE payed = TRUE");
$count = $result->num_rows;
$count2 = $pay->num_rows;
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
}
?>
<!doctype html>
<html lang="en">

<!--header-->
<?php
//include header
include "header.php";
?>

<body class="bg-gray-100 max-h-screen">
    <div><?php include "sidebar.php" ?></div>
    <div><?php include_once("menu.php") ?></div>
    <div class="grid grid-cols-4 grid-flow-col gap-8 h-screen mr-10 ml-10">
        <div class="w-full h-full"></div>
        <div class="bg-white p-2 shadow-md w-full h-full col-span-2"> </div>
        <div class="bg-white w-full h-full"> </div>
    </div>

    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

</html>