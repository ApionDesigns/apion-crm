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
$edit = mysqli_real_escape_string($conn, $_GET['e']);
$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
$row3 = mysqli_fetch_assoc($sql3);
$sql = mysqli_query($conn, "SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
$sqlCom = $query = $conn->query("SELECT * FROM comment WHERE client_id = '{$edit}'");
$sqlCom2 = mysqli_query($conn,"SELECT * FROM comment WHERE client_id = '{$edit}'");
$query2 = $conn->query("SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $rowCom2 = mysqli_fetch_assoc($sqlCom2);
}
?>
<!doctype html>
<html lang="en">

<?php
//include header
include "php/header.php";
?>

<body class="bg-gray-700">
    <?php
    if (empty($row['inspec_day'])) { ?>
        <div class="bg-red-500 text-center py-2 lg:px-4 " style="position: relative;">
            <div class="p-2 bg-red-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-red-600 uppercase px-2 py-1 text-xs font-bold mr-3 animate-pulse duration-700 ease-out">New</span>
                <span class="font-semibold mr-2 text-left flex-auto uppercase">Client requires inspection date</span>
                <a href="#inspecday"><svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                    </svg></a>
            </div>
        </div>
        <!-- pop over notification -->
        <div id="popover" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation -->
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Notification
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 flex justify-center">
                                    <pre>
Clients require attention:
  cause:
  -No inspection date
  -No Job date set
</pre>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--user sees that there is error for clients-->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button onClick="closePop()" type="submit" value="OK" class="cursor-pointer w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- pop over notification ends here-->
    <?php //header("location: emnotif.php");
    } else {
    }
    ?>
    <script>
        function openNav() {
            document.getElementById("popover").style.width = "100%";
        }

        function closePop() {
            document.getElementById("popover").style.width = "0";
        }
    </script>
    <?php include_once("menu.php") ?>
    <div class="grid grid-cols-6 grid-flow-cols">
    <div class="col-span-1"></div>
    <div class="mt-4 mb-20 col-span-4 place-self-center bg-gray-100 p-4 rounded-t-3xl place-items-center" id="this">
        <!--comment option-->
        <div class="shadow-xl rounded-md" style="position: fixed; width:60%; height:70%; z-index:97; display:none;" id="moreEditOpt1">
            <div class="bg-gray-700 p-5 overflow-y-scroll rounded-2xl shadow-2xl" style="position: fixed; width:inherit; height:70%;">
                <form enctype="multipart/form-data" action="php/comment.php?client=<?php echo $row['client_id']; ?>" method="POST">
                    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                        <a :href="item.url" class="bg-gray-200 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 shadow-md">
                                <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                                <div>
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3">
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 h-8 border-gray-300 bg-gray-500 text-white text-sm">
                                                Title
                                            </span>
                                            <input type="text" name="title" class="pl- 4 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="mt-1">
                                        <textarea id="about" name="about" rows="3" class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Comment...."></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-black">
                                        Brief description/comment.
                                    </p>
                                </div>
                                </dl>
                            </a>
                            <header class="flex items-center justify-between bg-gray-100 border rounded-md p-2">
                                <h2 class="text-lg leading-6 font-medium text-black">Comments</h2>
                                <div class="flex gap-4">
                                    <button type="submit"  class="cursor-pointer items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-100 hover:bg-green-600 text-green-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Post
                                    </button>
                                    <!-- Close Section-->
                                    <span onclick="moreEditOpt1.style.display='none'" class="cursor-pointer items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Cancel
                                    </span>
                                </div>
                            </header>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
                                <?php while($rowCom2 = $sqlCom->fetch_array() ){ ?> 
                                    <li x-for="item in items">
                                        <a href="php/comment.php?del=<?php echo $rowCom2['id']; ?>" style="float: right;" class="hover:text-red-600 text-black cursor-pointer p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a :href="item.url" class="hover:bg-green-500 bg-green-300 hover:border-transparent hover:shadow-lg group block rounded-lg p-4">
                                            <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                                            <div>
                                                <dt class="sr-only">Title</dt>
                                                <dd class="group-hover:text-white leading-6 font-medium text-black">
                                                <?php echo $rowCom2['title']; ?>
                                                </dd>
                                            </div>
                                            <div>
                                                <dt class="sr-only">Category</dt>
                                                <dd class="group-hover:text-light-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                                                <?php echo $rowCom2['comment']; ?>
                                                </dd>
                                            </div>
                                            </dl>
                                        </a>
                                    </li>    
                                <?php } ?>
                            </ul>
                        </section>
                </form>
            </div>
        </div>
         <!--more field opt-->
        <div class="bg-white shadow-xl rounded-md p-5 overflow-y-scroll border-4" style="position: fixed; width:60%; height:70%; margin-left:5%; z-index:97; display:none;" id="moreEditOpt">
            <!-- Close Section-->
            <span onclick="this.parentElement.style.display='none'" class="cursor-pointer -ml-10 -mt-4" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-red-300 fill-current text-red-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </span>
            <!--bait station-->
            <?php if($row['job_type']=="Baiting"){ ?>
                <div class="grid gap-2" id="bait">
                    <header class="border mt-4">
                        <div class="grid justify-items-stretch bg-white max-w-1xl mx-auto py-4 px-4 sm:px-4 lg:px-8 gap-2">
                            <h1 class="text-1xl font-bold justify-self-center uppercase">
                                <div class="items-center">
                                    <div>
                                        Bait stations </a>
                                        <!--<?php echo $row['client_id']; ?>-->
                                    </div>
                                </div>
                            </h1>
                        </div>
                    </header>
                    <table class="w-full border divide-y divide-gray-200">
                        <form method="post" action="bait.php?e=<?php echo $row['client_id'] ?>">
                            <div class="flex">
                                <div class="px-4 py-3 text-center text-xs uppercase tracking-wider"><input type="text" placeholder="eg. 3423432" class="p-2 rounded-md border w-full shadow-inner" name="bait_st_name"></div>
                                <div class="px-4 py-3 text-center text-xs text-white uppercase tracking-wider grid"><button class="bg-green-300 p-2 rounded-md hover:bg-green-400 uppercase">create</button></div>
                            </div>
                        </form>
                        <thead class="sticky top-0 bg-white shadow-md">
                            <tr class="divide-x divide-gray-200">
                                <!--inspection received by-->
                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Station Name
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 1
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 2
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 3
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 4
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 5
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 6
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 7
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 8
                                </th>

                                <th scope="col" class="px-4 py-4 text-center text-xs uppercase tracking-wider">
                                    Status 9
                                </th>

                            </tr>
                        </thead>

                        <?php
                        $hostname = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "apcrm";
                        $output = "";
                        $conn = mysqli_connect($hostname, $username, $password, $dbname);
                        $edit = mysqli_real_escape_string($conn, $_GET['e']);
                        $sql = mysqli_query($conn, "SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
                        $sqlstations = $conn->query("SELECT * FROM bait_stations WHERE client_id = '{$edit}'");
                        $stations = $conn->query("SELECT * FROM bait_stations WHERE client_id = '{$edit}'");
                        $query2 = $conn->query("SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
                        while ($stations->fetch_array() > 0) {
                            $row7 = mysqli_fetch_array($sqlstations);?>
                            <form  method="post" action="php/editbait.php?id=<?php echo $row7['id'] ?>">
                                <tbody class="divide-y divide-green-800 hover:bg-gray-50 bg-white h-5/6 overflow-y-scroll">
                                    <!--technician who recieved the inspection-->
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 text-center grid gap-4">
                                        <input type="text" name="station_name" class="p-2 rounded-md shadow-inner text-xs" placeholder="<?php echo $row7['Station_name']; ?>">
                                        <div class="flex gap-4">
                                            <a href="./baitdel?id=<?php echo $row7['id']; ?>" class="p-2 rounded-md hover:text-red-500 shadow-inner cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <button class="p-2 rounded-md bg-green-300 hover:bg-green-400 text-white">Update</button>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="baitStat1" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st1bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st1bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d1" min="2020-01-01" value="<?php if(!empty($row7['date1'])){echo date($row7['date1']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat2" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st2bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st2bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d2" min="2020-01-01" value="<?php if(!empty($row7['date2'])){echo date($row7['date2']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat3" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st3bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st3bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d3" min="2020-01-01" value="<?php if(!empty($row7['date3'])){echo date($row7['date3']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat4" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st4bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st4bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d4" min="2020-01-01" value="<?php if(!empty($row7['date4'])){echo date($row7['date4']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat5" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st5bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st5bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d5" min="2020-01-01" value="<?php if(!empty($row7['date5'])){echo date($row7['date5']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat6" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st6bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st6bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d6" min="2020-01-01" value="<?php if(!empty($row7['date6'])){echo date($row7['date6']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat7" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st7bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st7bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d7" min="2020-01-01" value="<?php if(!empty($row7['date7'])){echo date($row7['date7']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat8" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st8bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st8bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d8" min="2020-01-01" value="<?php if(!empty($row7['date8'])){echo date($row7['date8']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-500 text-xs uppercase whitespace-nowrap">
                                        <div class="grid gap-2">
                                            <select name="bait_stat9" class="p-2 rounded-md shadow-inner">
                                                <option value="" class="bg-green-300 text-white" disabled selected>
                                                <?php if(empty($row7['st9bait'])){ ?>
                                                    Status
                                                <?php }else{
                                                    echo $row7['st9bait'] . '*';
                                                } ?>
                                                </option>
                                                <option value="Bait-Untouched" >Bait-Untouched</option>
                                                <option value="Bait-Eaten" >Bait-Eaten</option>
                                            </select>
                                            <input type="date" name="bait_d9" min="2020-01-01" value="<?php if(!empty($row7['date9'])){echo date($row7['date9']);}else{echo date('Y-m-d');} ?>" max="2050-12-31" class="p-2 rounded-md shadow-inner">
                                        </div>
                                    </td>
                                        
                                </tbody>
                            </form>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
            <!--images begin here-->
            <header class="bg-gradient-to-r from-green-400 to-blue-300 mt-4">
                <div class="grid justify-items-stretch max-w-1xl mx-auto py-4 px-4 sm:px-4 lg:px-8 gap-2">
                    <h1 class="text-1xl font-bold text-white justify-self-center uppercase">
                        <div class="items-center">
                            <div>
                                Images</a>
                            </div>
                        </div>
                    </h1>
                </div>
            </header>
            <?php
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $dbname = "apcrm";
            $output = "";
            $conn = mysqli_connect($hostname, $username, $password, $dbname);
            //$sql = mysqli_query($conn, "SELECT * FROM inspecimages WHERE client_id = '{$edit}'");
            $sql2 = mysqli_query($conn, "SELECT * FROM images WHERE client_id = '{$edit}'");
            $imglist = $conn->query("SELECT * FROM images WHERE client_id = '{$edit}'");
            if (mysqli_num_rows($sql) > 0 ) {
                //$row = mysqli_fetch_assoc($sql);
                $row2 = mysqli_fetch_assoc($sql2);
            } ?>
            <form action="php/imgupload.php?client_id=<?php echo $row['client_id'] ?>" method="post" enctype="multipart/form-data" class="grid justify-items-stretch p-2 grid-cols-2 gap-4">
                <div class="grid w-full h-60 items-center justify-center bg-white">
                    <label class="w-60 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg hover:bg-gray-100 tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a Image</span>
                        <input type='file' name="file" class="hidden" />
                    </label>
                    <input type="submit" name="submit" value="Upload J.O" class="p-2 m-2 w-60 rounded-md ring-4 ring-green-100 justify-self-center bg-green-300 hover:bg-green-800 text-white cursor-pointer">
                </div>
                <div  class="grid grid-flow-cols grid-cols-4 gap-6 bg-white p-4 h-60 overflow-y-scroll p-4">
                <?php while ($row2 = $imglist->fetch_array()) { ?>
                    <div class="grid bg-gray-100">
                            <img id="myImg" style="width: 100%; height: 100%;" src="../uploads/<?php echo $row2['imgfile_name']; ?>" onclick="imgModal(this);">
                        <a download href="./uploads/<?php echo $row2['imgfile_name']; ?>" class="bg-green-400 hover:bg-green-500 justify-self-center w-full uppercase text-white p-2 text-center rounded-b-md">
                            Download    
                        </a>
                    </div>
                <?php }
                ?>
            </div>
            </form>
            <!-- The expanding image container -->
            <div class="container mt-4 bg-white rounded-md p-4 m-2" style="display:none;">
            <!-- Close the image -->
            <span onclick="this.parentElement.style.display='none'" class="cursor-pointer" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-red-300 fill-current text-red-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </span>

            <!-- Expanded image -->
            <img id="expandedImg" style="width:50%; height:100%;  margin-left: auto;margin-right: auto;">

            <!-- Image text -->
            <div id="imgtext"></div>
            </div>
    </div>
        <!-- Apion CRM v0.1+ -->
        <div class="grid gap-2">
            <header class="rounded-t-3xl">
                <div class="flex justify-items-stretch items-center bg-white max-w-1xl mx-auto p-3 gap-2 justify-between border rounded-t-2xl">
                    <h1 class="font-bold p-2">
                        <div class="flex items-center">
                            <div><a href="./index">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="black">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                            </div>
                            <div style="float: left;" class="uppercase text-gray-500 hover:text-black text-xs">
                                Back</a>
                                <!--<?php echo $row['client_id']; ?>-->
                            </div>
                        </div>
                    </h1>
                    <h1 class="text-1xl font-bold justify-self-center uppercase">
                        <div class="items-center">
                            <div>
                                Client Information</a>
                                <!--<?php echo $row['client_id']; ?>-->
                            </div>
                        </div>
                    </h1>
                    <div></div>
                </div>
                <div class="mt-2 bg-green-500 rounded-full p-2 flex items-center flex gap-4">
                    <button onclick="moreEditOpt()" class="items-center h-auto cursor-pointer rounded-full ring-2 ring-white p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-200 hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button onclick="moreOpt()" class="items-center h-auto cursor-pointer rounded-full ring-2 ring-white p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-200 hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </header>
            <main>
                <div class="max-w-3x1 mx-auto">
                    <!-- display user content -->
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden grid gap-4">
                                <form class="grid gap-2" action="php/clientedit.php?client_id=<?php echo $row['client_id'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <table class="min-w-full bg-white">
                                        <thead class="border">
                                            <tr class="divide-x divide-gray-200">
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider">
                                                    Client Information
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    unique id
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Created Date
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Contact
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Job Type
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Inspection<br> Date
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Date Inspection<br> Returned
                                                </th>
                                                <th scope="col" class="px-4 py-3 text-left text-xs uppercase tracking-wider text-center">
                                                    Date<br>of job
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
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <!--while  there is data in the database-->
                                            <?php while ($row = $query2->fetch_array()) { ?>
                                                <!--table information-->
                                                <tr class="border divide-x divide-gray-200">
                                                    <td class="px-2 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="grid gap-1">
                                                                <div class="text-sm font-medium font-bold">
                                                                    <!--first/last name-->
                                                                    <?php echo $row['first_name']; ?><br><?php echo $row['last_name']; ?>
                                                                </div>
                                                                <!--email-->
                                                                <div class="text-sm">
                                                                    <?php echo $row['email']; ?>
                                                                </div>
                                                                <!--tel-->
                                                                <div class="text-sm">
                                                                    Tel: <?php echo $row['tel']; ?>
                                                                </div>
                                                                <!--full address-->
                                                                <div class="text-sm">
                                                                    <a target="_blank" href="https://www.google.com/maps/place/<?php echo $row['street_address']; ?>+<?php echo $row['city_address']; ?>">
                                                                        <p class="text-sm"><?php echo $row['street_address']; ?><br><?php echo $row['city_address']; ?></p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!--unique id-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <div class="text-xs"><?php echo $row['client_id']; ?></div>
                                                    </td>
                                                    <!--created-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center">
                                                        <div class="text-xs">
                                                            <?php
                                                            //echo the date created for client information
                                                            $date = strtotime($row['created_at']);
                                                            echo date('j, F, Y', $date);
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <!--contact type-->
                                                    <td class="grid justify-items-center h-full py-14 whitespace-nowrap text-xs">
                                                        <div onclick="myFunction()">
                                                            <?php
                                                            //if there is no status 
                                                            if ($row['contact'] == 'Email') { ?>
                                                                <div><svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="black">
                                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                                </svg> </div>
                                                                <div>Email</div>
                                                            <?php } elseif ($row['contact'] == "Call") { ?>
                                                                <div><svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="black">
                                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                                </svg></div>
                                                                <div>Call</div>
                                                            <?php } else { ?>

                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                    <!--jobtype-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center border rounded-br-3xl">
                                                        <div class="text-xs"><?php echo $row['job_type']; ?></div>
                                                    </td>
                                                    <!--inspection date-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-center text-xs text-gray-500">
                                                        <?php
                                                        if (empty($row['inspec_day'])) { ?>

                                                        <?php } else { ?>
                                                            <div class="text-gray-500">
                                                                <?php
                                                                $doj = $row['inspec_day'];
                                                                echo date("d/m/Y", strtotime($doj));;
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <!--Date inspection returned-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['inspec_dayrt'])) { ?>

                                                        <?php } else { ?>
                                                            <?php $inrtdoj = $row['inspec_dayrt'];
                                                            echo date("d/m/Y", strtotime($inrtdoj)); ?>
                                                        <?php } ?>
                                                    </td>
                                                    <!--job date-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['day_of_job'])) { ?>
                                                            <input type="date" name="jobDay" min="2020-01-01" max="2050-12-31" class="text-xs shadow-inner p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                        <?php } else { ?>
                                                            <div class="text-gray-500">
                                                                <?php
                                                                $doj = $row['day_of_job'];
                                                                echo date("d/m/Y", strtotime($doj));;
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <!--invoice id-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['invoice_id'])) { ?>
                                                            <input placeholder="LEA26987" name="invoice_num" class="text-xs p-2 rounded-md border hover:border-gray-800 focus:outline-none w-16"></input>
                                                        <?php } else {
                                                            echo "LEA" . $row['invoice_id'];
                                                        } ?>
                                                    </td>
                                                    <!--cost for job-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center text-xs">
                                                        <?php
                                                        if (empty($row['cost'])) { ?>
                                                            $ <input placeholder="10,000" name="cost_price" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-16"></input>
                                                        <?php } else { ?>
                                                            <?php
                                                            echo "$" . number_format($row['cost']); ?>
                                                        <?php } ?>
                                                    </td>
                                                    <!--amount payed by client-->
                                                    <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center">
                                                        <?php
                                                        if (empty($row['paid'])) { ?>
                                                            <select name="jPay" class="p-1 rounded-md text-xs">
                                                                <option value="" disabled selected><?php echo ("STATUS"); ?></option>
                                                                <option value="1">YES</option>
                                                                <option value="2">PENDING</option>
                                                            </select>
                                                        <?php } else if($row['paid'] == 1) {
                                                            echo "PAYED";
                                                        }else if($row['paid' == 2]){ ?>
                                                            <select name="jpay" class="p-1 rounded-md">
                                                                <option value="" disabled selected><?php echo ("PENDING"); ?></option>
                                                                <option value="1">yes</option>
                                                                <option value="">Pending</option>
                                                            </select>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!--inspection starts here-->
                                    <header class="border mt-4">
                                        <div class="grid justify-items-stretch bg-white max-w-1xl mx-auto py-4 px-4 sm:px-4 lg:px-8 gap-2">
                                            <h1 class="text-1xl font-bold justify-self-center uppercase">
                                                <div class="items-center">
                                                    <div>
                                                        Inspection </a>
                                                        <!--<?php echo $row['client_id']; ?>-->
                                                    </div>
                                                </div>
                                            </h1>
                                        </div>
                                    </header>
                                    <table class="min-w-full bg-white">
                                        <thead class="border">
                                            <tr class="divide-x divide-gray-200">
                                                <!--inspection recieved by-->
                                                <th scope="col" class="px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Call Log
                                                </th>
                                                <!--inspection recieved by-->
                                                <th scope="col" class="px-4 py-3 text-lcenter text-xs uppercase tracking-wider">
                                                    Date<br>Received
                                                </th>
                                                <!--lead tech for job-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Lead<br>Technician
                                                </th>
                                                <!--inspection date-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Inspection<br>Date
                                                </th>
                                                <!--workers on inspection-->
                                                <!--expected inspection return date-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Expected<br>Returned Date
                                                </th>
                                                <!--date inspection actually returned-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Date<br>Returned
                                                </th>
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    inspection<br>Status
                                                </th>
                                                <!--inspection return reciever-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Inspection<br>Received by
                                                </th>
                                                <!--date return reciever recieved inspection-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Date<br>Received
                                                </th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $hostname = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "apcrm";
                                        $output = "";
                                        $conn = mysqli_connect($hostname, $username, $password, $dbname);
                                        $edit = mysqli_real_escape_string($conn, $_GET['e']);
                                        $sql = mysqli_query($conn, "SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
                                        $sql4 = mysqli_query($conn, "SELECT * FROM users");
                                        $sql5 = mysqli_query($conn, "SELECT * FROM users");
                                        $sql6 = mysqli_query($conn, "SELECT * FROM users");
                                        $query2 = $conn->query("SELECT * FROM clients WHERE client_id = '{$edit}'");
                                        if (mysqli_num_rows($sql) > 0) {
                                            $row = mysqli_fetch_assoc($sql);
                                            $row4 = mysqli_fetch_assoc($sql4);
                                            $row5 = mysqli_fetch_assoc($sql5);
                                            $row6 = mysqli_fetch_assoc($sql6);
                                        } ?>
                                            <?php
                                            //if there is no status 
                                            if (empty($row['inspec_day']) && empty($row['inspec_month']) && empty($row['inspec_year'])) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-white text-gray-500">
                                            <?php } elseif (!empty($row['inspec_day']) && empty($row['inspec_dayrt'])) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-green-300 text-white">
                                            <?php } elseif ($row['inspec_day'] == TRUE && $row['inspec_dayrt'] == TRUE) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-green-500 text-white font-bold">
                                            <?php } ?>
                                            <tr class="border">
                                                <!--technician who recieved the inspection-->
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-center">
                                                    <?php
                                                    if (empty($row['inspecrcver'])) { ?>
                                                        <select name="inrcvrtname" class="text-xs p-1 rounded-md">
                                                            <option value="" disabled selected>Employee</option>
                                                            <?php while ($row5 = $sql5->fetch_array()) { ?>
                                                                <option value="<?php echo $row5['first_name'] ?> <?php echo $row5['last_name'] ?>"><?php echo $row5['first_name'] ?> <?php echo $row5['last_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else {
                                                        echo $row['inspecrcver'];
                                                    } ?>
                                                </td>

                                                <!--inspection recieved date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['inspec_dayrcv'])) { ?>
                                                        <input placeholder="10" type="date" min="2020-01-01" max="2050-12-31" name="inspecDayrcv" class="text-xs p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php
                                                        $inspecdrcv = $row['inspec_dayrcv'];
                                                        echo date("d/m/Y", strtotime($inspecdrcv));
                                                        ?>
                                                    <?php } ?>
                                                </td>
                                                <!--lead tech for job-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['lead_tech'])) { ?>
                                                        <select name="leadTech" class="p-1 rounded-md">
                                                            <option value="" disabled selected>Employee</option>
                                                            <?php while ($row4 = $sql4->fetch_array()) { ?>
                                                                <option value="<?php echo $row4['first_name'] ?> <?php echo $row4['last_name'] ?>"><?php echo $row4['first_name'] ?> <?php echo $row4['last_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else {
                                                        echo $row['lead_tech'];
                                                    } ?>
                                                </td>
                                                <!--inspection date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['inspec_day'])) { ?>
                                                        <input type="date" id="inspecday" name="inspecDay" min="2020-01-01" max="2050-12-31" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <div>
                                                            <?php
                                                            $doj = $row['inspec_day'];
                                                            echo date("d/m/Y", strtotime($doj));
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <!--expected inspection return date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['inspec_exdayrt'])) { ?>
                                                        <input placeholder="10" type="date" min="2020-01-01" max="2050-12-31" name="exinspecDayrt" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php $inexrtd = $row['inspec_exdayrt'];
                                                        echo date("d/m/Y", strtotime($inexrtd)); ?>
                                                    <?php } ?>
                                                </td>
                                                <!--date inspection actually returned-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['inspec_dayrt'])) { ?>
                                                        <input type="date" name="inspecDayrt" min="2020-01-01" max="2050-12-31" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php $inrtdoj = $row['inspec_dayrt'];
                                                        echo date("d/m/Y", strtotime($inrtdoj)); ?>
                                                    <?php } ?>
                                                </td>
                                                <!--inspection status-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    //if there is no status 
                                                    if (empty($row['inspec_day']) && empty($row['inspec_month']) && empty($row['inspec_year'])) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-white">
                                                            <?php echo "Unset"; ?>
                                                        </span>
                                                    <?php } elseif (!empty($row['inspec_day']) && empty($row['inspec_dayrt'])) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-white">
                                                            <?php echo "in-progress"; ?>
                                                        </span>
                                                    <?php } elseif ($row['inspec_day'] == TRUE && $row['inspec_dayrt'] == TRUE) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                            <?php echo "completed"; ?>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <!--inspection return reciever-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['rtinspec_rcver'])) { ?>
                                                        <select name="rturnrcvname" class="p-1 rounded-md">
                                                            <option value="" disabled selected>Employee</option>
                                                            <?php while ($row6 = $sql6->fetch_array()) { ?>
                                                                <option value="<?php echo $row6['first_name'] ?> <?php echo $row6['last_name'] ?>"><?php echo $row6['first_name'] ?> <?php echo $row6['last_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else {
                                                        echo $row['rtinspec_rcver'];
                                                    } ?>
                                                </td>
                                                <!--date return reciever recieved inspection-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-500 text-center">
                                                    <?php
                                                    if (empty($row['rtinspec_dayrcv'])) { ?>
                                                        <input placeholder="10" type="date" min="2020-01-01" max="2050-12-31" name="inspecDayrcvrt" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php $rtindrcv = $row['rtinspec_dayrcv'];
                                                        echo date("d/m/Y", strtotime($rtindrcv)); ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--job order starts here-->
                                    <header class="border mt-4">
                                        <div class="grid justify-items-stretch bg-white max-w-1xl mx-auto py-4 px-4 sm:px-4 lg:px-8 gap-2">
                                            <h1 class="text-1xl font-bold justify-self-center uppercase">
                                                <div class="items-center">
                                                    <div>
                                                        JOB ORDER </a>
                                                        <!--<?php echo $row['client_id']; ?>-->
                                                    </div>
                                                </div>
                                            </h1>
                                        </div>
                                    </header>
                                    <table class="min-w-full bg-white">
                                        <thead class="border">
                                            <tr class="divide-x divide-gray-200">
                                                <!--Job Order recieved by-->
                                                <th scope="col" class="px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Job Order<br>Recieved by
                                                </th>
                                                <!--Job Order recieved by-->
                                                <th scope="col" class="px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Date<br>Recieved
                                                </th>
                                                <!--inspection date-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Job Order<br>Date
                                                </th>
                                                <!--workers on Job Order-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Job Order<br> Status
                                                </th>
                                                <!--expected Job Order return date-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Expected<br>Return Date
                                                </th>
                                                <!--date Job Order actually returned-->
                                                <th scope="col" class=" px-4 py-3 text-center text-xs uppercase tracking-wider">
                                                    Date<br>Returned
                                                </th>

                                            </tr>
                                        </thead>
                                        <?php
                                        $hostname = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "apcrm";
                                        $output = "";
                                        $conn = mysqli_connect($hostname, $username, $password, $dbname);
                                        $edit = mysqli_real_escape_string($conn, $_GET['e']);
                                        $sql = mysqli_query($conn, "SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
                                        $query2 = $conn->query("SELECT * FROM residential WHERE client_id = '{$edit}' UNION SELECT * from commercial WHERE client_id = '{$edit}'");
                                        $sql4 = mysqli_query($conn, "SELECT * FROM users");
                                        if (mysqli_num_rows($sql) > 0) {
                                            $row = mysqli_fetch_assoc($sql);
                                            $row4 = mysqli_fetch_assoc($sql4);
                                            $row5 = mysqli_fetch_assoc($sql5);
                                        } ?>
                                            <?php if (empty($row['jo_day']) && empty($row['jo_dayrt'])) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-white text-gray-500">
                                            <?php } elseif (!empty($row['jo_day']) && empty($row['jo_dayrt'])) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-green-300 text-white">
                                            <?php } elseif ($row['jo_day'] == TRUE && $row['jo_dayrt'] == TRUE) { ?>
                                                <tbody class="border divide-y divide-gray-200 bg-green-500 text-white font-bold">
                                             <?php } ?>

                                            <tr>
                                                <!--technician who recieved the job order-->
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-center">
                                                    <?php
                                                    if (empty($row['jorcver'])) { ?>
                                                        <select name="jdrvr" class="p-1 rounded-md text-xs">
                                                            <option value="" disabled selected>Employee</option>
                                                            <?php while ($row4 = $sql4->fetch_array()) { ?>
                                                                <option value="<?php echo $row4['first_name'] ?> <?php echo $row4['last_name'] ?>"><?php echo $row4['first_name'] ?> <?php echo $row4['last_name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } else {
                                                        echo $row['jorcver'];
                                                    } ?>
                                                </td>

                                                <!--job order recieved date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['jo_dayrcv'])) { ?>
                                                        <input placeholder="10" type="date" name="jDrcv" class="text-xs p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php
                                                        $inspecdrcv = $row['jo_dayrcv'];
                                                        echo date("d/m/Y", strtotime($inspecdrcv));
                                                        ?>
                                                    <?php } ?>
                                                </td>
                                                <!--job order date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['jo_day'])) { ?>
                                                        <input type="date" name="joderDay" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <div class="text-sm">
                                                            <?php
                                                            $doj = $row['jo_day'];
                                                            echo date("d/m/Y", strtotime($doj));
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                <!--job order status-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    //if there is no status 
                                                    if (empty($row['jo_day']) && empty($row['jo_month']) && empty($row['jo_year'])) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-white">
                                                            <?php echo "Unset"; ?>
                                                        </span>
                                                    <?php } elseif (!empty($row['jo_day']) && empty($row['jo_dayrt'])) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-white">
                                                            <?php echo "in-progress"; ?>
                                                        </span>
                                                    <?php } elseif ($row['jo_day'] == TRUE && $row['jo_dayrt'] == TRUE) { ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-white">
                                                            <?php echo "completed"; ?>
                                                        </span>
                                                    <?php } ?>
                                                </td>
                                                <!--expected job order return date-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['jo_exdayrt'])) { ?>
                                                        <input placeholder="10" type="date" min="2020-01-01" max="2050-12-31" name="exjoDayrt" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17"></input>
                                                    <?php } else { ?>
                                                        <?php $inexrtd = $row['jo_exdayrt'];
                                                        echo date("d/m/Y", strtotime($inexrtd)); ?>
                                                    <?php } ?>
                                                </td>
                                                <!--date job order actually returned-->
                                                <td class="px-4 py-4 whitespace-nowrap text-xs text-center">
                                                    <?php
                                                    if (empty($row['jo_dayrt'])) { ?>
                                                        <input type="date" name="joderDayrt" min="2020-01-01" max="2050-12-31" class="p-2 rounded-md border hover:border-gray-800 focus:outline-none w-17 text-black"></input>
                                                    <?php } else { ?>
                                                        <?php $inrtdoj = $row['jo_dayrt'];
                                                        echo date("d/m/Y", strtotime($inrtdoj)); ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="position: fixed; z-index:101; right:0px; bottom:0px;" class="m-8 mb-7">
                                        <div role="alert">
                                            <!--submit button-->
                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Publish
                                            </button>
                                            <button onclick="window.print('this')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--job order ends here-->
                                
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <div class="col-span-1"></div>
    <?php include "php/sidebar.php" ?>
    <footer class="footer"><?php include_once('php/hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>
<!--script for modal image enlarger-->
<script>
function imgModal(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
} 
</script>
<script>
    function moreEditOpt() {
        document.getElementById("moreEditOpt").style.display = "block";
    }
</script>
<script>
    function moreOpt() {
        document.getElementById("moreEditOpt1").style.display = "block";
    }
</script>
</html>