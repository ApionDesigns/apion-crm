<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: index");
}
?>
<?php
setcookie("ApionCRM", "Apion", time() + 3600, '/');
?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC");
$tx = mysqli_query($conn, "SELECT * FROM admins");
$query = $conn->query("SELECT * FROM clients ORDER BY created_at DESC");
$result = $conn->query("SELECT * FROM clients");
$pay = $conn->query("SELECT * FROM clients WHERE payed = TRUE");
$count = $result->num_rows;
$count2 = $pay->num_rows;
$row_tax = mysqli_fetch_assoc($tx);
$tax = $row_tax['tax'];

if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
}
?>
<?php
// define variables and set to empty values
$tax  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tax = $_POST["tax"];
    if($row_tax['tax'] =NULL){
        $tx = mysqli_query($conn, "INSERT INTO admins SET tax = '$tax'");
    }else{
        $tx = mysqli_query($conn, "UPDATE admins SET tax = '$tax'");
    }
}
?>

<!doctype html>
<html lang="en">

<!--header-->
<?php
//include header
include "header.php";
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
    $spray = $conn->query("SELECT * FROM clients WHERE job_type = 'Spraying'");
    $Baiting = $conn->query("SELECT * FROM clients WHERE job_type = 'Baiting'");
    $Misting = $conn->query("SELECT * FROM clients WHERE job_type = 'Misting'");
    $Fogging = $conn->query("SELECT * FROM clients WHERE job_type = 'Fogging'");
    $Fumigation = $conn->query("SELECT * FROM clients WHERE job_type = 'Fumigation'");
    $Dusting = $conn->query("SELECT * FROM clients WHERE job_type = 'Dusting'");
    $Pumping = $conn->query("SELECT * FROM clients WHERE job_type = 'Drilling-&-Pumping'");
    $Upholstery = $conn->query("SELECT * FROM clients WHERE job_type = 'Upholstery-Cleaning'");
    $Carpet = $conn->query("SELECT * FROM clients WHERE job_type = 'Carpet-Cleaning'");
    $Power = $conn->query("SELECT * FROM clients WHERE job_type = 'Power-Washing'");
    $Chair = $conn->query("SELECT * FROM clients WHERE job_type = 'Chair-Cleaning'");
    $Flood = $conn->query("SELECT * FROM clients WHERE job_type = 'Flood-Remediation'");
    $Chemicals = $conn->query("SELECT * FROM clients WHERE job_type = 'Chemicals'");
    $result = $conn->query("SELECT * FROM clients");
    $pay = $conn->query("SELECT * FROM clients WHERE payed = TRUE");

    $count = $result->num_rows;
    $count2 = $pay->num_rows;
    $sprayed = $spray->num_rows;
    $Bait = $Baiting->num_rows;
    $Mist = $Misting->num_rows;
    $Fog = $Fogging->num_rows;
    $Fum = $Fumigation->num_rows;
    $Dust = $Dusting->num_rows;
    $Pump = $Pumping->num_rows;
    $Uphol = $Upholstery->num_rows;
    $Carp = $Carpet->num_rows;
    $Pow = $Power->num_rows;
    $Chai = $Chair->num_rows;
    $Flo = $Flood->num_rows;
    $Chem = $Chemicals->num_rows;
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
    }
?>

<!--header-->
<?php
//include header
include "header.php";
?>

<body class="grid bg-gray-700">
<div style="z-index: 99;position: fixed;"><?php include "sidebar.php" ?></div>
<div style="position: fixed; width:100%; z-index:98;"><?php include_once("menu.php") ?></div>
<div class="p-4 rounded-md grid grid-cols-3 gap-4 mt-14 bg-white shadow-2xl mr-4" style="position: fixed; z-index:97; display:none; right:0px;" id="addjob">
    <div class="justify-self-center w-80">
        <form enctype="multipart/form-data" action="clientCreate.php" method="POST">
            <div class="overflow-hidden">
                <p class="grid grid-cols-2 gap-2 text-2xl font-bold p-2 bg-green-300 text-white mt-4">Client Form
                    <a onclick="closeJ()" class="place-self-end"><svg class="h-10 w-10 p-1 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg></a>
                </p>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="gap-4">
                        <!--first name-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input type="text" required name="first_name" id="first_name" autocomplete="given-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--last name-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input type="text" required name="last_name" id="last_name" autocomplete="family-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--tel-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Telephone</label>
                            <input type="text" required name="tel" id="tel" autocomplete="tel-number" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--email-->
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="text" required name="email" id="email" autocomplete="email" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--street address-->
                        <div class="col-span-6">
                            <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                            <input type="text" required name="street_address" id="street_address" autocomplete="street-address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--city-->
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" required name="city_address" id="city_address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>
                        <div class="flex gap-4">
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-6 text-white font-bold uppercase">Job Type</p><br>
                                <select id="jtype" name="jtype" class="p-1 rounded-md">
                                    <option value="" disabled selected>Choose option</option>
                                    <option value="Spraying">Spraying</option>
                                    <option value="Baiting">Baiting</option>
                                    <option value="Misting">Misting</option>
                                    <option value="Fogging">Fogging</option>
                                    <option value="Fumigation">Fumigation</option>
                                    <option value="Dusting">Dusting</option>
                                    <option value="Drilling-&-Pumping">Drilling & Pumping</option>
                                    <option value="Upholstery-Cleaning">Upholstery Cleaning</option>
                                    <option value="Carpet-Cleaning">Carpet Cleaning</option>
                                    <option value="Power-Washing">Power Washing</option>
                                    <option value="Chair-Cleaning">Chair Cleaning</option>
                                    <option value="Flood-Remediation">Flood Remediation</option>
                                    <option value="Chemicals">Chemicals</option>
                                </select>
                            </div>

                            <!--form of contact-->
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-6 text-white font-bold uppercase">CONTACT</p><br>
                                <select name="call" id="call" class="p-1 rounded-md">
                                    <option value="Call">Call</option>
                                    <option value="Email">Email</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="px-4 py-3 bg-green-300 text-right">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 text-sm font-bold uppercase rounded-md text-white bg-green-600 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Save
                    </button>
                </div>
                <p class="p-2 text-xs">Note: Clients are created then modified.</p>
            </div>
        </form>
    </div>
</div>
<div id="infoEdit" style="position: fixed; width:100%; z-index:97; margin-left:25%; width:50%; margin-top:100px; display:none;">
    <div  class="bg-white p-2 w-auto shadow-2xl rounded-md">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white overflow-hidden ">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
        Adjustments
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Details and settings for company.
        </p>
    </div>
    <div class="border-t border-gray-200">
        <dl>
        <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
            <p class="font-bold">Tax</p><p>set to:</p>
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <input type="text" placeholder="<?php echo $row_tax['tax'] . "%"; ?>" class="w-20 p-2 text-center" name="tax">
            </dd>
        </div>
        <input type="submit" class="font-medium text-green-600 p-2 w-20 text-white hover:text-black m-2 hover:bg-green-400 hover:text-white cursor-pointer rounded-md bg-green-200 ring-4 ring-green-100" value="Set">
        </form>
        <button onclick="infoEditClose()" class="rounded-md bg-red-200 p-2 hover:bg-red-400 text-white ring-4 ring-red-100">
                Close
            </button>
        </dl>
    </div>
    </div>


    </div>
</div>
    <?php include_once("menu.php") ?>
    <div class="grid grid-cols-6 mb-12 ml-40 mr-40">
        <div></div>
        <div class="grid gap-4 col-span-4 place-self-center  m-4">
            <header class="bg-gray-800 p-2 mt-20">
                <div class="flex items-center w-atuo mx-auto justify-between">
                    <h1 class="text-2xl h-full text-white uppercase text-left p-2 rounded-br-2xl font-bold">
                        Dashboard
                    </h1>
                    </button>
                </div>
            </header>
            <div class="rounded-md p-2 shadow-inner bg-white">
                <button onclick="infoEdit()" class="hover:bg-green-200 p-2 w-9 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 rounded-md w-full">

                <div class="">
                    <!--display the chart-->
                    <div id="top_x_div" style="width: auto; height: 300px;" class="bg-white p-5 rounded-md hover:shadow-2xl"></div>
                </div>

                <div class="">
                    <!--display the chart-->
                    <div id="piechart" style="width: auto; height: 300px;" class=" bg-white p-5 rounded-md hover:shadow-2xl"></div>
                </div>
            </div>
            <!--grid top columns-->

            <!--grid top columns end-->
            <div style="position: relative; z-index:1;">
                <!-- Apion CRM v0.1+ -->
                <div class="flex flex-col">
                    <main class="hover:shadow-2xl px-5 py-5 bg-white rounded-md">
                        <div class="max-w-3x1 mx-auto">
                            <!-- display user content -->
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-y-scroll h-96">
                                        <table class="table-fixed min-w-full divide-y-2 flex-wrap border">
                                            <thead class="border sticky top-0 text-gray-800 shadow-2xl bg-white">
                                                <tr class="divide-x divide-gray-200">
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider">
                                                        Client Information
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        unique id
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Job Type
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Inspection
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        D.O.J
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Invoice#
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Cost
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        payed
                                                    </th>
                                                    <td scope="col" class="px-4 py-4 text-center text-xs uppercase border-l text-center">
                                                        <button onclick="newJ()" class="text-white bg-green-400 hover:bg-green-500 p-2 rounded-md">NEW JOB</button>
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
                                                        <td class="px-4 py-4 whitespace-nowrap border-r border-gray-200">
                                                            <div class="flex items-center">
                                                                <div>
                                                                    <div class="text-sm font-medium">
                                                                        <!--first/last name-->
                                                                        Name: <a href="edit?e=<?php echo $row['client_id'] ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--unique id for clients-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-center rounded-br-3xl border-r border-gray-200">
                                                            <a href="edit?e=<?php echo $row['client_id'] ?>">
                                                                <div class="text-sm"><?php echo $row['client_id']; ?></div>
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
                                                        <td class="px-4 py-4 whitespace-nowrap text-center border-r border-gray-200">
                                                            <div class="text-sm text-gray-500"><?php echo $row['job_type']; ?></div>
                                                        </td>
                                                        <!--inspection date-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-center border-r border-gray-200">
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
                                                        <td class="px-4 py-4 whitespace-nowrap text-center border-r border-gray-200">
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
                                                        </td>
                                                        <!--job date-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center border-r border-gray-200">
                                                            <?php
                                                            if (empty($row['day_of_job'])) {
                                                            } else {
                                                                $doj = $row['day_of_job'];
                                                                echo date("d/m/Y", strtotime($doj));;
                                                            }
                                                            ?>
                                                        </td>
                                                        <!--invoice id-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center border-r border-gray-200">
                                                            <?php echo "LEA" . $row['invoice_id']; ?>
                                                        </td>
                                                        <!--cost for job-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center border-r border-gray-200">
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
                                                        <?php if($row['payed'] == 1) {
                                                                echo "PAYED";
                                                            }else if($row['payed' == 2]){ 
                                                                echo ("PENDING"); 
                                                            } ?>
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
                </div>
            </div>
        </div>
        <div></div>
    </div>
    <br>

    <footer class="footer">
        <div id="myDIV" style="position: absolute; right:30px; bottom:0px; z-index:101; display:none">
            <?php include("userchat.php") ?>
        </div><?php include_once('hfooter.php'); ?>
    </footer>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    //bar graph for jobs vs jobs completed
    var jobs = '<?php echo $count; ?>';
    var jcom = '<?php echo $count2; ?>';
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Name', '#'],
            ["JOBS", Number(jobs)],
            ["COMPLETED", Number(jcom)],
        ]);

        var options = {
            width: 500,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'COMPANY JOBS STATISTICS',
                subtitle: ''
            },
            bars: 'vertical', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: {
                        side: 'top',
                        label: ''
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "100%"
            }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
    };
    var sprayed = '<?php echo $sprayed; ?>';
    var Bait = '<?php echo $Bait; ?>';
    var Mist = '<?php echo $Mist; ?>';
    var Fog = '<?php echo $Fog; ?>';
    var Fum = '<?php echo $Fum; ?>';
    var Dust = '<?php echo $Dust; ?>';
    var Pump = '<?php echo $Pump; ?>';
    var Uphol = '<?php echo $Uphol; ?>';
    var Carp = '<?php echo $Carp; ?>';
    var Pow = '<?php echo $Pow; ?>';
    var Chai = '<?php echo $Chai; ?>';
    var Flo = '<?php echo $Flo; ?>';
    var Chem = '<?php echo $Chem; ?>';
    //donut chart job category performance
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Spraying', Number(sprayed)],
            ['Baiting', Number(Bait)],
            ['Misting', Number(Mist)],
            ['Fogging', Number(Fog)],
            ['Fumigation', Number(Fum)],
            ['Dusting', Number(Dust)],
            ['Drilling & Pumping', Number(Pump)],
            ['Upholstery Cleaning', Number(Uphol)],
            ['Carpet Cleaning', Number(Carp)],
            ['Power Washing', Number(Pow)],
            ['Chair Cleaning', Number(Chai)],
            ['Flood Remediation', Number(Flo)],
            ['Chemicals', Number(Chem)]
        ]);

        var options = {
            title: 'Catergory Performance:',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<script>
    function infoEdit() {
        document.getElementById("infoEdit").style.display = "block";
    }
    function infoEditClose() {
        document.getElementById("infoEdit").style.display = "none";
    }
</script>
<script>
    function newJ() {
        document.getElementById("addjob").style.display = "block";
    }
    function closeJ() {
        document.getElementById("addjob").style.display = "none";
    }
</script>

</html>