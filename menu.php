<!-- Apion CRM v0.1+ -->
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "apcrm";
$output = "";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC");
$sql2 = mysqli_query($conn, "SELECT * FROM users");
$query = $conn->query("SELECT * FROM clients ORDER BY created_at DESC");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $row2 = mysqli_fetch_assoc($sql2);
}
?>
<div>
    <nav class="bg-green-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white font-bold p-2 rounded-md"><a href="index">AP-CRM</a></h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <div class="relative"><?php include_once "search.php" ?></div>
                            <a href="home" class="text-white hover:bg-green-700 bg-green-600 hover:text-white px-3 py-2 rounded-full text-sm font-medium">Client Dashboard</a>
                            <a href="#" class="text-white hover:bg-green-700 bg-green-600 hover:text-white px-3 py-2 rounded-full text-sm font-medium">Completed</a>
                            <a href="#" class="text-white hover:bg-green-700 bg-green-600 hover:text-white px-3 py-2 rounded-full text-sm font-medium">Leads</a>
                            <a href="#" class="text-white hover:bg-green-700 bg-green-600 hover:text-white px-3 py-2 rounded-full text-sm font-medium">Reports</a>

                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="flex items-center ml-3 relative">
                            <div class="bg-green-600 text-white px-2 py-1 rounded-md text-sm font-medium flex items-center">
                                <div class="p-2 rounded-md font-bold">
                                    <?php
                                    echo date('j, F Y');
                                    //echo "Day " . date("l");
                                    ?>
                                </div>
                            </div>
                            <div x-data="{ dropdownOpen: false }" class="grid grid-cols-1 relative md:m-0 ml-8 w-8 h-8 justify-items-center">
                                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md focus:outline-none">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
                                        <path fill-rule="evenodd" d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                                <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl z-20 mt-11">
                                    <a href="usercreate.php" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-green-400 hover:text-white border border-t-0 border-l-0 border-r-0 border-gray-300">
                                        Users
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-green-400 hover:text-white">
                                        Help
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-green-400 hover:text-white border border-t-0 border-l-0 border-r-0 border-gray-300">
                                        Settings
                                    </a>
                                    <a href="logout.php?logout_id=<?php echo $row2['user_uid']; ?>" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-red-400 hover:text-white">
                                        Sign Out
                                    </a>
                                </div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


                            <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                            <!--<div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
              </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </nav>
</div>