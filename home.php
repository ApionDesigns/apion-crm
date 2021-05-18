<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>

<?php
$list = 5;
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC LIMIT $list");
$query = $conn->query("SELECT * FROM clients ORDER BY created_at DESC LIMIT $list");
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
    <div id="myDIV" style="position: absolute; right:30px; bottom:0px; z-index:101; display:none">
        <?php include("userchat.php") ?>
    </div>
    <div class="grid grid-flow-col grid-cols-4 gap-8 h-auto col-span-2 text-3xl p-6 h-auto">

        <div class="bg-white w-2xl col-span-4 p-6 hover:shadow-2xl shadow-sm">
            <!--grid top columns-->
            <div>

                <!--grid top columns end-->
                <div style="position: relative; z-index:1;">

                    <!-- Apion CRM v0.1+ -->
                    <div class="flex flex-col">
                        <div class="flex mb-4 gap-4 p-2">
                            <div class="grid border-2 border-gray-500 p-5 h-24 hover:bg-green-600 text-black hover:text-white shadow-sm rounded-md shadow-md">
                                <p class="font-bold">$80,000</p>
                                <p class="text-xs">Expense</p>
                            </div>
                            <div class="grid border-2 border-gray-500 p-5 h-24 hover:bg-green-600 hover:text-white text-black shadow-sm rounded-md shadow-md">
                                <p class=" font-bold">$80,000</p>
                                <p class="text-xs">Earnings</p>
                            </div>
                        </div>
                        <header class="bg-green-600 p-2">
                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl h-full text-white uppercase text-left p-2 rounded-br-2xl font-bold">
                                    Client Summary
                                    <p class="text-xs">last five (5) clients added</p>
                                </h1>
                            </div>
                        </header>
                        <main>
                            <div class="max-w-3x1 mx-auto py-2">
                                <!-- display user content -->
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full divide-y-2 flex-wrap">
                                                <thead class="bg-green-500">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider">
                                                            Client Information
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            unique id
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Job Type
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Inspection<br> Date
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Inspection<br> Status
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Quoted
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Date<br>of JOB
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Invoice#
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            Cost
                                                        </th>
                                                        <th scope="col" class="px-4 py-3 text-left text-xs text-white uppercase tracking-wider text-center">
                                                            payed
                                                        </th>
                                                        <td scope="col" class="px-4 py-4 text-center text-xs uppercase border-l border-white text-center bg-green-600 hover:bg-green-800">
                                                            <?php
                                                            if (empty($row['client_id'])) { ?>
                                                                <a href="job.php" class="text-white animate-pulse" class="popup">+ Job</a>
                                                            <?php } else { ?>
                                                                <a href="job" class="text-white">+ Job</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </thead>

                                                <?php
                                                $num = 0;
                                                $counted = 10;
                                                while (
                                                    $row = $query->fetch_array()
                                                ) {
                                                    $num++ ?>
                                                    <tbody class="bg-white hover:bg-gray-100">
                                                        <!--table information-->
                                                        <tr>
                                                            <td class="px-2 py-4 whitespace-nowrap bg-green-500 hover:bg-green-600">
                                                                <div class="flex items-center">
                                                                    <div class="grid gap-1">
                                                                        <div class="text-sm font-medium text-white font-bold">
                                                                            <!--first/last name-->
                                                                            Name: <a href="edit?e=<?php echo $row['client_id'] ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></a>
                                                                        </div>
                                                                        <!--email-->
                                                                        <div class="text-xs text-white">
                                                                            Email: <?php echo $row['email']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <!--unique id for clients-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-center bg-green-400 rounded-br-3xl hover:bg-green-500">
                                                                <a href="edit?e=<?php echo $row['client_id'] ?>">
                                                                    <div class="text-sm text-white"><?php echo $row['client_id']; ?></div>
                                                                </a>
                                                            </td>
                                                            <!--created-->
                                                            <!--<td class="px-4 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-500">
                                        <?php
                                                    //echo the date created for client information
                                                    $date = strtotime($row['created_at']);
                                                    echo date('j, F Y', $date);
                                        ?>
                                        </div>
                                        </td>-->
                                                            <!--contact type-->
                                                            <!--<td class="px-4 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-gray-500 ml-5">
                                            <?php
                                                    //if there is no status 
                                                    if ($row['contact'] == 'Email') { ?>
                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                            <?php } elseif ($row['contact'] == "Call") { ?>
                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                            <?php } else { ?>

                                            <?php } ?>
                                            </div>
                                        </td>-->
                                                            <!--jobtype-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                                                <div class="text-sm text-gray-500"><?php echo $row['job_type']; ?></div>
                                                            </td>
                                                            <!--inspection date-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                                                <div class="text-sm text-gray-500">
                                                                    <?php
                                                                    if (empty($row['inspec_day'])) {
                                                                    } else {
                                                                        $inspec = $row['inspec_day'];
                                                                        echo date("d/m/Y", strtotime($inspec));;
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <!--displays inspection status-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                                                <?php
                                                                //if there is no status 
                                                                if (empty($row['inspec_day'])) { ?>
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-white">
                                                                        <?php echo "Unset"; ?>
                                                                    </span>
                                                                <?php } elseif (!empty($row['inspec_day']) && empty($row['inspec_dayrt'])) { ?>
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-white">
                                                                        <?php echo "in-progress"; ?>
                                                                    </span>
                                                                <?php } elseif ($row['inspec_day'] == TRUE  && $row['inspec_dayrt'] == TRUE) { ?>
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                                        <?php echo "completed"; ?>
                                                                    </span>
                                                                <?php } ?>
                                                            </td>
                                                            <!--display inspection ends here-->
                                                            <!--quoted-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                                <?php
                                                                if (empty($row['quotation'])) { ?>
                                                                    <!--does nothing-->
                                                                <?php } else {
                                                                    echo "True";
                                                                } ?>
                                                            </td>
                                                            <!--job date-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                                <?php
                                                                if (empty($row['day_of_job'])) {
                                                                } else {
                                                                    $doj = $row['day_of_job'];
                                                                    echo date("d/m/Y", strtotime($doj));;
                                                                }
                                                                ?>
                                                            </td>
                                                            <!--invoice id-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                                <?php echo "LEA" . $row['invoice_id']; ?>
                                                            </td>
                                                            <!--cost for job-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                                <?php
                                                                if (empty($row['cost'])) { ?>
                                                                    $
                                                                <?php } else { ?>
                                                                    <?php
                                                                    echo "$" . number_format($row['cost']); ?>
                                                                <?php } ?>
                                                            </td>
                                                            <!--amount payed by client-->
                                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center border-r border-gray-200">
                                                                <?php
                                                                echo "$" . number_format($row['payed']); ?>
                                                            </td>
                                                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                                                <div class="text-sm text-gray-500 ml-2 flex justify-center">
                                                                    <div class="p-2">
                                                                        <a href="edit?e=<?php echo $row['client_id'] ?>" class="text-gray-400 hover:text-gray-800">
                                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </main>
                        <a href="clientsdash" class="bg-green-100 text-center p-3 hover:bg-green-300 text-black hover:text-white cursor-pointer w-full place-self-center uppercase text-xs">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 grid-flow-col gap-8 mr-10 ml-10 mt-6">
        <div class="w-full"></div>
        <div class="w-full h-full"> </div>
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