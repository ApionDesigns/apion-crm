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

<body>
    <?php include_once("menu.php") ?>
    <div class="p-5">
        <div class="grid grid-cols-3 gap-2">
            <div class="bg-white shadow overflow-hidden border-2 border-green-400">
                <div>
                    <h3 class=" text-lg leading-6 font-medium font-bold bg-green-400 text-white p-1">
                        Customers
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 p-4">
                        <?php
                        $hostname = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "apcrm";
                        $output = "";
                        $conn = mysqli_connect($hostname, $username, $password, $dbname);
                        $result = $conn->query("SELECT * FROM clients");
                        $count = $result->num_rows; ?>

                        You Currently have
                        <a href="leads"><u class="font-bold text-green-400 text-md"><?php echo $count; ?></u></a> Customers.
                        <?php ?>
                    </p>
                </div>
            </div>
            <div></div>
            <div></div>
        </div>
    </div>
</body>