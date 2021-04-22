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

<body class="bg-gray-100">
    <?php include_once("menu.php") ?>
    <div class="p-5" style="position: relative;">
        <header class="rounded-md bg-green-600">
            <div class="flex items-center max-w-1xl mx-auto py-4 px-4 sm:px-6 lg:px-8 gap-2">
                <h1 class="text-3xl font-bold text-white">
                    Reports
                </h1>
            </div>
        </header>
        <div class="grid grid-cols-2 gap-4 p-10">

            <div>
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
                            ['Opening Move', '#'],
                            ["JOBS", Number(jobs)],
                            ["JOBS COMPLETED", Number(jcom)],
                        ]);

                        var options = {
                            title: 'Chess opening moves',
                            width: 650,
                            legend: {
                                position: 'none'
                            },
                            chart: {
                                title: 'COMPANY JOBs STATISTICS',
                                subtitle: 'Number of Jobs vs Jobs Completed'
                            },
                            bars: 'horizontal', // Required for Material Bar Charts.
                            axes: {
                                x: {
                                    0: {
                                        side: 'top',
                                        label: '# COUNT'
                                    } // Top x-axis.
                                }
                            },
                            bar: {
                                groupWidth: "80%"
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                        chart.draw(data, options);
                    };
                </script>
                <!--display the chart-->
                <div id="top_x_div" style="width: auto; height: 500px;" class="bg-white p-5"></div>
                <div class="flex py-3 bg-green-400 px-2 text-white mt-2">You Currently have <a href="leads" class="px-1"><u class="font-bold text-md"><?php echo $count; ?></u></a> Customers.</div>
            </div>

            <div>
                <script type="text/javascript">
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
                            ['Fogging', Number(Mist)],
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
                <!--display the chart-->
                <div id="piechart" style="width: auto; height: 500px;"></div>
            </div>
        </div>
    </div>
    <?php include "sidebar.php" ?>
    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>