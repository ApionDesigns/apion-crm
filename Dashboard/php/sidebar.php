<!--sidebar menu-->
<div id="mySidenav" class="sidenav bg-gray-800 text-white shadow items-stretch shadow-lg -ml-4 font-bold">
    <a href="javascript:void(0)" class="closebtn self-center -mt-3 -mr-3" onclick="closeNav()">&times;</a>
    <a onclick="newJ()" class="flex w-full cursor-pointer">
        <div class="flex text-xs hover:bg-green-600 p-2 rounded-full bg-green-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <p class="text-sm"> CREATE</p>
        </div>
    </a>
    <?php 
    if ($_SESSION['user_name'] == "Admin") { ?>
    <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=apcrm" class="flex text-xs flex w-full">
        <div class="flex hover:bg-gray-600 p-2 rounded-full bg-gray-700">
            <svg class="h-5 w-5 self-center mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <p class="text-sm"> USERS</p>
        </div>
    </a>
    <?php } ?>
    <a href="leads" class="flex text-xs flex w-full">
        <div class="flex hover:bg-gray-600 p-2 rounded-full bg-gray-700">
            <svg class="h-5 w-5 self-center mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
            <p class="text-sm"> LEADS</p>
        </div>
    </a>
    <a href="#" class="flex text-xs flex w-full">
        <div class="flex hover:bg-gray-600 p-2 rounded-full bg-gray-700">
            <svg class="h-5 w-5 self-center mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
            </svg>
            <p class="text-sm"> Documentation</p>
        </div>
    </a>

</div>