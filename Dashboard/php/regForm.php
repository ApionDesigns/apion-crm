<div class="rounded-md w-62 grid gap-4 p-2 bg-white shadow-2xl pb-2" style="position: fixed; z-index:96;width: auto; display:none; right:0px;" id="addjob">

    <div class="h-14">

    </div>
    <div class="grid grid-flow-cols gap-2 items-center">
        <div class="flex gap-2">
            <button onclick="regForm2()" id="resBT" class="flex-1 font-bold focus:bg-green-600 bg-green-400 hover:bg-green-600 text-white p-2">RESIDENTIAL</button>
            <button onclick="regForm()" id="comBT" class="flex-1 font-bold focus:bg-green-600 bg-green-400 hover:bg-green-600 text-white p-2">**COMMERCIAL</button>
        </div>
    </div>
    <div class="grid pt-2">
        <div class="w-62 hover:shadow-2xl" id="coMM">
            <div class="overflow-hidden">
                <div class="flex justify-center items-center bg-green-600 text-white text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                </svg>
                <p class="text-2xl font-bold p-2 uppercase">
                    Commercial
                </p>
                </div>
            <div>
            <p class="text-xs bg-green-400 p-2 text-white font-bold uppercase text-center">Select or Register</p><br>
            <form enctype="multipart/form-data" action="cliForm/commercial.php" method="POST">
            <div class="p-2">
                <select id="jtype" name="client" class="p-1 rounded-md w-full py-2">
                    <option value="" disabled selected>Choose option</option>
                    <?php
                        $sqlCM = $conn->query("SELECT * FROM commercial");
                    while (
                        //while there is name in category database
                        $rowCM = $sqlCM->fetch_array()
                    ) { ?>
                    <option value="<?php echo $rowCM['client_id']; ?>">
                    <?php echo $rowCM['business_name']; ?> <?php echo $rowCM['contactPerson']; ?>, ID: <?php echo $rowCM['client_id']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            </div>
                <p class="text-xs bg-green-400 p-2 mt-6 text-white font-bold uppercase">Register</p><br>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="gap-4">
                        <!--first name-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Business Name</label>
                            <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--last name-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Contact Person</label>
                            <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--tel-->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Telephone</label>
                            <input type="text" name="tel" id="tel" autocomplete="tel-number" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--email-->
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="text" name="email" id="email" autocomplete="email" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--street address-->
                        <div class="col-span-6">
                            <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                            <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>

                        <!--city-->
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city_address" id="city_address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                        </div>
                        <div class="flex gap-4">
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-3 text-white font-bold uppercase">Job Type</p><br>
                                <select id="jtype" name="jtype" class="p-1 rounded-md">
                                    <option value="" disabled selected>Choose option</option>
                                    <?php
                                    while (
                                        //while there is name in category database
                                        $rowComSql = $comCatName->fetch_array()
                                    ) { ?>
                                    <option value="<?php echo $rowComSql['JName']; ?>">
                                    <?php echo $rowComSql['JName']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!--form of contact-->
                            <div>
                                <p class="text-xs bg-green-400 p-2 mt-3 text-white font-bold uppercase">CONTACT</p><br>
                                <select name="call" id="call" class="p-1 rounded-md">
                                    <option value="Call">Call</option>
                                    <option value="Email">Email</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="flex px-4 py-3 gap-2 bg-green-300 text-right">
                        <button type="submit" class="flex-1 justify-center py-2 px-4 text-sm font-bold uppercase rounded-md text-white bg-green-600 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Save
                        </button>
                        <button onclick="closeJ()" class="flex-1 uppercase py-2 px-4 place-self-right bg-yellow-500 hover:bg-yellow-600 text-white p-1 rounded-md">
                            cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-62 hover:shadow-2xl" id="resiDen" style="display: none;">
            <div class="overflow-hidden">
                        
                <div class="flex justify-center items-center bg-green-600 text-white text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                </svg>
                <p class="text-2xl font-bold p-2 uppercase">
                    Residential
                </p>
                </div>
            <div>
            <p class="text-xs text-center bg-green-400 p-2 text-white font-bold uppercase">Select or Register</p><br>
            <form enctype="multipart/form-data" action="cliForm/residential.php" method="POST">
            <div class="p-2">
                <select id="jtype" name="client" class="p-1 rounded-md w-full py-2">
                    <option value="" disabled selected>Choose option</option>
                    <?php
                        $sqlRd = $conn->query("SELECT * FROM residential");
                    while (
                        //while there is name in category database
                        $rowRd = $sqlRd->fetch_array()
                    ) { ?>
                    <option value="<?php echo $rowRd['client_id']; ?>">
                    <?php echo $rowRd['first_name']; ?> <?php echo $rowRd['last_name']; ?>, ID: <?php echo $rowRd['client_id']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            </div>
            <p class="text-xs bg-green-400 p-2 mt-6 text-white font-bold uppercase">Register</p><br>
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="gap-4">
                            <!--first name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>

                            <!--last name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>

                            <!--tel-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel_number" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <input type="text" name="tel" id="tel" autocomplete="tel-number" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>

                            <!--email-->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="text" name="email" id="email" autocomplete="email" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>

                            <!--street address-->
                            <div class="col-span-6">
                                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                                <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>

                            <!--city-->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city_address" id="city_address" class="p-1 border rounded-md border-gray-100 mt-1 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300">
                            </div>
                            <div class="flex gap-4">
                                <div>
                                    <p class="text-xs bg-green-400 p-2 mt-3 text-white font-bold uppercase">Job Type</p><br>
                                    <select id="jtype" name="jtype" class="p-1 rounded-md">
                                        <option value="" disabled selected>Choose option</option>
                                        <?php
                                        while (
                                            //while there is name in category database
                                            $row = $jCatName->fetch_array()
                                        ) { ?>
                                        <option value="<?php echo $row['JName']; ?>">
                                        <?php echo $row['JName']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <!--form of contact-->
                                <div>
                                    <p class="text-xs bg-green-400 p-2 mt-3 text-white font-bold uppercase">CONTACT</p><br>
                                    <select name="call" id="call" class="p-1 rounded-md">
                                        <option value="Call">Call</option>
                                        <option value="Email">Email</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="flex gap-2 items-center px-4 py-3 bg-green-300 text-right">
                        <button type="submit" class="flex-1 ustify-center py-2 px-4 text-sm font-bold uppercase rounded-md text-white bg-green-600 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Save
                        </button>
                        <button onclick="closeJ()" class="flex-1 uppercase cols-span-1 py-2 px-4 place-self-right bg-yellow-500 hover:bg-yellow-600 text-white p-1 rounded-md">
                            cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>