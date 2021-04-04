<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql3 = mysqli_query($conn, "SELECT * FROM users");
$query3 = $conn->query("SELECT * FROM users");
if (mysqli_num_rows($sql3) > 0) {
    $row3 = mysqli_fetch_assoc($sql3);
}
?>
<?php
//include header
include "header.php";
?>
<!--header included above-->

<body>
    <?php include "menu.php" ?>

    <div class="px-10 justify-center flex">
        <div class="flex relative gap-x-5 z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full">


            <main class="mt-10">
                <!--forms for registering and sign in-->
                <div>
                    <form action="register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="flex flex-col justify-center bg-white p-2 rounded-md">
                            <div class=" flex justify-center p-1">
                                <h1 class="text-4x1 font-bold">Create Account</h1>
                            </div>
                            <div class="flex justify-center p-1">
                            </div>
                            <input type="text" required name="uname" placeholder="Username" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input name="first_name" required type="text" placeholder="First Name" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input name="last_name" required type="text" placeholder="Last Name" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input name="uemail" required type="text" placeholder="Email" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>
                            <input name="password" required type="password" placeholder="Password" class="p-2 m-2 bg-gray-50 rounded-md border focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"><br>

                            <p class="text-sm m-2">By pressing sign up you accept the terms<br> and conditions.</p>
                            <input type="submit" name="submit" class="bg-green-400 m-2 p-2 rounded-md text-lg text-white font-bold hover:bg-green-800" value="REGISTER USER"></input>
                        </div>
                    </form>
                </div>
            </main>
            <main class="mt-10">
                <!--forms for registering and sign in-->
                <div>
                    <div class="flex flex-col justify-center bg-white p-2 rounded-md">
                        <div class=" flex justify-center p-1 bg-green-500 p-2 text-white px-5 ">
                            <h1 class="text-4x1 font-bold uppercase">Users</h1>
                        </div>
                        <?php while ($row3 = $query3->fetch_array()) { ?>
                            <div class="p-1 text-center text-white text-sm font-bold border-b border-gray-100 bg-green-400">
                                <?php echo $row3['first_name']; ?>
                            </div>
                            <br>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <footer class="footer"><?php include_once('footer.php'); ?></footer>
</body>