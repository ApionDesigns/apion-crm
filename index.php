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
</body>