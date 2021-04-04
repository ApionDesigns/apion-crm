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

<body class="bg-gray-50">
    <?php include_once("menu.php") ?>
    <!--pop button for email form-->
    <button onclick="myFunction()" style="position: absolute; right:15px; bottom:0px; z-index:102;" class="ring-0 focus:outline-none">
        <svg class="w-12 h-12 m-5 bg-green-500 hover:bg-green-800 rounded-full p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
        </svg>
    </button>
    <!--display the email form-->
    <div id="myDIV" style="position: absolute; right:30px; bottom:0px; z-index:101; display:none">
        <?php include("emailpop.php") ?>
    </div>
    <!--pop button for email form-->
    <a href="callender" style="position: absolute; right:80px; bottom:0px; z-index:100;" class="ring-0 focus:outline-none">
        <svg class="w-12 h-12 m-5 bg-green-500 hover:bg-green-800 rounded-full p-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
        </svg>
    </a>
    <div class="m-8" style="position: relative; z-index:1;">
        <!-- Apion CRM v0.1+ -->
        <div class="flex flex-col">
            <header class="rounded-md bg-green-500">
                <div class="flex max-w-1xl mx-auto py-4 px-4 sm:px-6 lg:px-8 gap-2">
                    <h1 class="text-3xl font-bold text-white uppercase">
                        Leads
                    </h1>
            </header>
            <main>
                <div class="max-w-3x1 mx-auto py-2">
                    <!-- display user content -->
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 rounded-md">
                                <table class="min-w-full divide-y divide-gray-200 flex-wrap">
                                    <thead class="bg-green-500">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider">
                                                Client Name
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                Email
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                Tel
                                            </th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center border-l border-gray-200">
                                                Address
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php while ($row = $query->fetch_array()) { ?>
                                        <tbody class="bg-white divide-y divide-white">
                                            <!--while  there is data in the database-->
                                            <!--table information-->
                                            <tr>
                                                <td class="px-2 py-4 whitespace-nowrap bg-green-500 hover:bg-green-600 border-r border-white">
                                                    <div class="flex items-center">
                                                        <div class="grid gap-1">
                                                            <div class="text-sm font-medium text-white font-bold">
                                                                <!--first/last name-->
                                                                Name: <a href="edit?e=<?php echo $row['client_id'] ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--unique id for clients-->
                                                <td class="px-4 py-4 whitespace-nowrap text-center border-r border-white border-b">
                                                    <div class="text-sm text-gray-500"><?php echo $row['email']; ?></div>
                                                </td>
                                                <!--tel-->
                                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                                    <div class="text-sm text-gray-500"><?php echo $row['tel']; ?></div>
                                                </td>
                                                <!--inspection date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                                    <div class="text-sm text-gray-500 grid justify-items-center">
                                                        <a target="_blank" href="https://www.google.com/maps/place/<?php echo $row['street_address']; ?>+<?php echo $row['city_address']; ?>">
                                                            <div class="flex ">
                                                                <svg class="h-5 w-5 self-center mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                                                </svg>
                                                                <p class="text-sm"><?php echo $row['street_address']; ?>, <?php echo $row['city_address']; ?></p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>

        </div>
    </div>
    </div>
    </head>
    <!--sidebar menu-->
    <?php include "sidebar.php" ?>

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