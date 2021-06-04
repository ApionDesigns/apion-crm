<?php
session_start();
if (isset($_SESSION['user_uid'])) {
    header("location: home");
}
?>
<?php
//include header
include "header.php";
?>

<link href="css/tailwind.css" rel="stylesheet">
<!--header included above-->

<body class="bg-white">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "apcrm";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// If database is not exist create one
if (!mysqli_select_db($conn,$dbName)){ ?>

<div class="px-10 justify-center flex items-center">
        <div class="relative z-10 pb-8 flex items-center mt-20 rounded-3xl">


            <main class="mt-10 flex justify-center">
                <!--forms for registering and sign in-->
                <div class="justify-center shadow-2xl rounded-md">
                    <!--ADMIN form-->
                    <form action="fload.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="form login p-2">
                        <div class="error-text"></div>
                        <div class=" flex justify-center p-1">
                            <h1 class="text-2xl font-black uppercase text-green-800">Create Admin</h1>
                        </div>
                        <div class="flex flex-col justify-center bg-white p-2 w-full rounded-md">
                        <input type="text" name="ademail" placeholder="Email" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
                            <input type="password" required="" name="adminp" placeholder="Password" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input type="submit" name="submit" class="bg-green-400 m-2 p-2 rounded-md text-lg text-white font-bold hover:bg-green-800 uppercase" value="create"></button>
                        </div>
                    </form>
                    <button onclick="note()" class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="p-2 bg-gray-100 text-xs" style="display: none;" id="note">Admin Email | Password has to be set<br>for databases to be created.<br><a onclick="notec()" class="text-red-400 cursor-pointer">close</a></div>
                </div>
            </main>
        </div>
    </div>

<?php
}else{ ?>
<div class="px-10 justify-center flex items-center">
        <div class="relative z-10 pb-8 flex items-center mt-20 rounded-3xl">


            <main class="mt-10 flex justify-center">
                <!--forms for registering and sign in-->
                <div class=" flex justify-center">
                    <!--login form-->
                    <form action="login.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="form login p-2">
                        <div class="error-text"></div>
                        <div class=" flex justify-center p-1">
                            <h1 class="text-2xl font-black uppercase text-green-800">Log In</h1>
                        </div>
                        <div class="flex flex-col justify-center bg-white p-2 w-full rounded-md">
                            <input type="text" required="" name="unamel" placeholder="Username" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input type="password" required="" name="upw" placeholder="Password" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input type="submit" name="submit" class="bg-green-400 m-2 p-2 rounded-md text-lg text-white font-bold hover:bg-green-800" value="LOGIN"></button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
<?php }
?>
</body>
<script>
    function note() {
        document.getElementById("note").style.display = "block";
    }
    function notec() {
        document.getElementById("note").style.display = "none";
    }
</script>