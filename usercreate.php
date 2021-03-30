<style>
    .footer {
        position: fixed;
        left: 0;
        z-index: 90;
        bottom: 0;
        width: 100%;
        color: white;
    }
</style>
<link href="css/tailwind.css" rel="stylesheet">
<!--header included above-->

<body class="bg-white">
    <?php include "menu.php" ?>

    <div class="px-10 justify-center flex">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full flex justify-center">


            <main class="mt-10 flex justify-center">
                <!--forms for registering and sign in-->
                <div class=" flex justify-center">
                    <div class="border-r border-gray-200"></div>
                    <!--sign up form for creating user account-->
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
        </div>
    </div>
    <footer class="footer"><?php include_once('footer.php'); ?></footer>
</body>