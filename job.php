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
$sql = mysqli_query($conn, "SELECT * FROM clients");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}
?>

<body class="bg-gray-50">
    <?php include_once("menu.php") ?>
    <div class="p-2 grid justify-items-stretch mt-6">
        <div class="mt-5 md:mt-0 md:col-span-2 justify-self-center">
            <form enctype="multipart/form-data" action="clientCreate.php" method="POST">
                <div class="overflow-hidden sm:rounded-md ">
                    <p class="grid grid-cols-2 gap-2 text-4xl font-bold p-2 bg-green-500 text-white pl-5">Client Form
                        <a href="home" class="place-self-end"><svg class="h-10 w-10 p-1 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg></a>
                    </p>
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="gap-4">
                            <!--first name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" required name="first_name" id="first_name" autocomplete="given-name" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--last name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" required name="last_name" id="last_name" autocomplete="family-name" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--tel-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel_number" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <input type="text" required name="tel" id="tel" autocomplete="tel-number" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--email-->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="text" required name="email" id="email" autocomplete="email" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--street address-->
                            <div class="col-span-6">
                                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                                <input type="text" required name="street_address" id="street_address" autocomplete="street-address" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--city-->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" required name="city_address" id="city_address" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-6 text-white rounded-md font-bold uppercase">Job Type</p><br>
                                <select id="jtype" name="jtype" class="bg-green-600 text-white p-1 rounded-md">
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
                                    <option value="Chair-Cleaning">Chair Cleanin</option>
                                    <option value="Flood-Remediation">Flood Remediation</option>
                                    <option value="Chemicals">Chemicals</option>
                                </select>
                            </div>

                            <!--form of contact-->
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-6 text-white rounded-md font-bold uppercase">FORM OF CONTACT</p><br>
                                <select name="call" id="call" class="bg-green-600 text-white p-1 rounded-md">
                                    <option value="Call">Call</option>
                                    <option value="Email">Email</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-green-400 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 text-sm font-bold uppercase rounded-md text-white bg-green-600 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include "sidebar.php" ?>
    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>
<!--navbar script-->
<script src="javascript/navbar.js"></script>