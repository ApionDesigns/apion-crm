<?php
session_start();
if (!isset($_SESSION['user_uid'])) {
    header("location: ../index");
}
?>
<?php
$hostname = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM residential UNION SELECT * from commercial ORDER BY created_at DESC");
$sqlRd = mysqli_query($conn, "SELECT * FROM residential");
$rowRd = mysqli_fetch_assoc($sqlRd);
$tx = mysqli_query($conn, "SELECT * FROM admins");
$query = $conn->query("SELECT * FROM residential UNION SELECT * from commercial ORDER BY created_at DESC");
$result = $conn->query("SELECT * FROM residential UNION SELECT * from commercial");
$pay = $conn->query("SELECT * FROM residential WHERE paid = TRUE UNION SELECT * from commercial WHERE paid = TRUE");
$sqlcliVM = mysqli_query($conn, "SELECT * FROM residential UNION SELECT * from commercial");
$count = $result->num_rows;
$count2 = $pay->num_rows;
$row_tax = mysqli_fetch_assoc($tx);
$tax = $row_tax['tax'];

if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $cliVM = mysqli_fetch_assoc($sqlcliVM);
    $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
}
?>

<!doctype html>
<html lang="en">

<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "apcrm";
    $output = "";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    $sql = mysqli_query($conn, "SELECT * FROM residential UNION SELECT * from commercial ORDER BY created_at DESC");
    $comSql = mysqli_query($conn, "SELECT * FROM commercial UNION SELECT * from commercial ORDER BY created_at DESC");
    $query = $conn->query("SELECT * FROM residential UNION SELECT * from commercial ORDER BY created_at DESC");
    $catName = $conn->query("SELECT * FROM jCat ORDER BY id DESC");
    $jCatName = $conn->query("SELECT * FROM jCat");
    $comCatName = $conn->query("SELECT * FROM jCat");
    $jBarCatName = $conn->query("SELECT * FROM jCat");
    $result = $conn->query("SELECT * FROM residential UNION SELECT * from commercial");
    $pay = $conn->query("SELECT * FROM residential WHERE paid = TRUE UNION SELECT * from commercial WHERE paid = TRUE");

    $count = $result->num_rows;
    $count2 = $pay->num_rows;
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $rowComSql = mysqli_fetch_assoc($comSql);
        $created_at = date('d-m-Y', strtotime($row['created_at'] . ' + 1 days'));
    }
?>

<!--header-->
<?php
//include header
include "php/header.php";
?>

<body class="grid bg-gray-200">
<div style="z-index: 99;position: fixed;"><?php include "php/sidebar.php" ?></div>
<div style="position: fixed; width:100%; z-index:98;"><?php include_once("menu.php") ?></div>

<!-- client registration forms -->
<?php include('php/regForm.php'); ?>

<form method="post" id="infoEdit" action="php/tx_nmCreate" class="justify-self-center" style="position: fixed; width:60%; z-index:97; margin-top:100px; display:none;"> 
    <div>
        <div  class="bg-white p-2 w-auto shadow-2xl rounded-md">
            <div class="bg-white overflow-hidden ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">
                    Adjustments
                    </h3>
                    <p class="mt-1 max-w-2xl text-xs text-gray-500">
                    Details and settings for company.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                            <p class="font-bold">Tax</p><p>set to:</p>
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <input type="text" placeholder="<?php echo $row_tax['tax'] . "%"; ?>" class="w-20 p-2 text-center bg-gray-100 border rounded-full focus:outline-none" name="tax">
                            </dd>
                        </div>
                        <div class="bg-gray-100 border px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 gap-2">
                            <dt class="text-gray-500 divide-y divide-gray-200 border-r grid gap-1">
                                <div>
                                    <p class="font-bold text-md">Categories:</p><p class="text-sm">Categories are created<br>to be used when creating new job. 
                                    <br>Use " , " to insert multiple options.</p>
                                </div>
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <input type="text" name="jName" class="p-2 bg-gray-50 rounded-full border focus:outline-none">
                                <div class="border p-4 mt-2 flex flex-wrap gap-2 bg-gray-50">
                                    <?php
                                    while (
                                        //while there is name in category database
                                        $row = $catName->fetch_array()
                                    ) { ?>
                                        <!--Shows category name list-->
                                        <div class="flex border gap-1 bg-white divide-x divide-gray-200 p-2 rounded-full items-center hover:shadow-md cursor-pointer h-10 text-center">
                                            <div class="p-1">
                                            <?php echo $row['JName']; ?>
                                            </div>
                                            <a href="tx_nmCreate?id=<?php echo $row['id']; ?>" class="p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400 hover:text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                            </dd>
                        </div>
                        <div class="flex gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <!-- Heroicon name: solid/check -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Publish
                            </button>
                            <button onclick="infoEditClose()" type="button" class="items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Cancel
                            </button>
                        </div>

                    </dl>
                </div>
            </div>
        </div>
    </div>
</form>
    <div class="grid grid-cols-6 mb-12 ml-40 mr-40">
        <div></div>
        <div class="grid gap-4 col-span-4 place-self-center  m-4">
            <header class="bg-gray-800 p-2 mt-10">
                <div class="flex items-center w-atuo mx-auto justify-between">
                    <h1 class="text-2xl h-full text-white uppercase text-left p-2 rounded-br-2xl font-bold">
                        Dashboard
                    </h1>
                    </button>
                </div>
            </header>
            <!--menu bar -->
            <div class="shadow-md"><?php include('php/menuBar.php'); ?></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 rounded-md w-full">

                <div class="">
                    <!--display the chart-->
                    <div id="top_x_div" style="width: auto; height: 300px;" class="bg-white p-5 rounded-md hover:shadow-2xl"></div>
                </div>

                <div class="">
                    <!--display the chart-->
                    <div id="visualization" style="width: auto; height: 300px;" class=" bg-white p-5 rounded-md hover:shadow-2xl"></div>
                </div>
            </div>

            <!--grid top columns end-->
            <div style="position: relative; z-index:1;">
                <!-- Apion CRM v0.1+ -->
                <div class="flex flex-col">
                    <main class="hover:shadow-2xl px-5 py-5 bg-white rounded-md">
                        <div class="max-w-3x1 mx-auto">
                            <!-- display user content -->
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8" style="scrollbar-width: thin; scrollbar-color: gray white;">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-y-scroll h-96">
                                        <table class="table-fixed min-w-full divide-y-2 flex-wrap border">
                                            <thead class="border sticky top-0 divide-x divide-gray-200 text-gray-800 shadow-2xl">
                                                <tr class="divide-y divide-x divide-gray-200 bg-white">
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider">
                                                        Client Information
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Job Type
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Inspection
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
                                                        paid
                                                    </th>
                                                    <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                        Status
                                                    </th>
                                                    <td scope="col" class="px-4 py-4 text-center text-xs uppercase border-l text-center">
                                                        <!--empty-->
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
                                                                    <div class="grid text-sm font-medium">
                                                                        <!--first/last name-->
                                                                        <a href="edit?e=<?php echo $row['client_id'] ?>"><?php echo $row['first_name']; ?><br><?php echo $row['last_name']; ?></a>
                                                                        <P class="text-xs"><?php echo $row['client_id']; ?></P>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                        <?php if($row['paid'] == 1) {
                                                                echo "PAiD";
                                                            }else if($row['paid' == 2]){ 
                                                                echo ("PENDING"); 
                                                            } ?>
                                                        </td>
                                                        <!--displays inspection status-->
                                                        <td class="px-4 py-4 whitespace-nowrap text-center border-r border-gray-200">
                                                            <?php
                                                            //if there is no status 
                                                            if (empty($row['inspec_day'])) { ?>
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-white">
                                                                    <?php echo "Unset"; ?>
                                                                </span>
                                                            <?php } elseif (!empty($row['inspec_day']) && empty($row['inspec_dayrt']) && empty($row['paid'])) { ?>
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-white">
                                                                    <?php echo "in-progress"; ?>
                                                                </span>
                                                            <?php } elseif ($row['inspec_day'] == TRUE  && $row['inspec_dayrt'] == TRUE && !empty($row['paid'])) { ?>
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                                    <?php echo "completed"; ?>
                                                                </span>
                                                            <?php } ?>
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
        <?php include_once('php/hfooter.php'); ?>
    </footer>
</body>
<!--navbar script-->
<script src="./javascript/navbar.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    //bar graph for jobs vs jobs completed
    var jobs = '<?php echo $count; ?>';
    var jCom = '<?php echo $count2; ?>';
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Name', '#', { role: 'style' }],
            ['JOBS', Number(jobs), 'silver'],
            ['COMPLETED', Number(jCom), '#34D399'],
        ]);

        var options = {
            legend: {
                position: 'none'
            },
            chart: {
                title: 'JOBS STATISTICS',
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
</script>
<!-- load api -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
//load package
google.load('visualization', '1', {packages: ['corechart']});
</script>

<script type="text/javascript">
function drawVisualization() {
    // Create and populate the data table.
    var data = google.visualization.arrayToDataTable([
        ['Name', 'Performance'],
        <?php
            while( $rowBar = $jBarCatName->fetch_assoc() ){
            extract($rowBar);
            echo "['{$JName}', {$jCount}],";
            }   
        ?>
    ]);
    var options = {
            legend: {
                position: 'none'
            },
            title: 'CATEGORIES PERFORMANCE',
        };

    // Create and draw the visualization.
    new google.visualization.ColumnChart(document.getElementById('visualization')).
    draw(data, options);
}

google.setOnLoadCallback(drawVisualization);
</script>

</html>