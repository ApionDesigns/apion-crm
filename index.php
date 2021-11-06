<?php
session_start();
if (isset($_SESSION['user_uid'])) {
    header("location: /Dashboard/index");
}
?>
<head>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="Apion">
    <meta charset="utf-8">
    <link href="./Dashboard/css/style.css" rel="stylesheet">
    <link href="./Dashboard/css/tailwind.css" rel="stylesheet">
        
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    
    <Title >Apion-CRM</Title>
</head>

<link href="css/tailwind.css" rel="stylesheet">
<!--header included above-->

<body class="bg-gray-700">
<?php
$servername = "localhost";
$username = "apion-crm";
$password = "O57_M@MwZPMeP]!v";
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
                <div class="justify-center">
                    <!--ADMIN form-->
                    <form action="fload.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="form login p-2">
                        <div class="error-text"></div>
                        <div class="grid justify-center p-1">
                            <h1 class="text-6xl font-black uppercase text-white text-center">APION-CRM</h1>
                            <h1 class="text-2xl  uppercase text-white text-center">1st time setup</h1>
                        </div>
                        <div class="flex flex-col justify-center p-2 w-full rounded-md">
                            <input type="email" name="ademail" placeholder="Email" class="text-white p-2 m-2 bg-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                            <input type="password" required="" name="adminp" placeholder="Password" class="text-white p-2 m-2 bg-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent"><br>
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
                        <div class="grid items-center p-1">
                            <div class="flex items-center rounded-md p-2">
                                <h1 class="text-6xl uppercase text-white font-bold text-center p-2">APION</h1><h1 class="text-6xl bg-green-600 rounded-l-full p-2 font-black uppercase text-white text-center">CRM</h1>
                            </div>
                        </div>
                        <div class="grid p-2 w-full rounded-md">
                            <div class="flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                                <input type="text" required="" name="unamel" placeholder="Username" class="text-white w-full p-3 pl-6 m-2 bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                            </div>
                            <div class="flex items-center w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                                </svg>
                                <input type="password" required="" name="upw" placeholder="Password" class="text-white w-full p-3 pl-6 m-2 bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                            </div>
                            <input type="submit" name="submit" class="bg-green-400 m-2 p-3 rounded-md text-lg text-white font-bold hover:bg-green-800 cursor-pointer ml-20 mr-20" value="LOGIN"></button>
                        </div>
                        <h1 class="text-xs text-white text-center">Apion-crm &copy; <?php echo date("Y"); ?></h1>
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