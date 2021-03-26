<head>
    <meta name="description" content="Apion CRM">
    <meta name="author" content="Apion">
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Apion CRM0.1</title>
</head>
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
<body class="bg-gray-200">
    <div><?php include_once("menu.php") ?></div>
    <div class="p-2 grid justify-items-stretch mt-6">
        <div class="mt-5 md:mt-0 md:col-span-2 justify-self-center">
            <form action="clientCreate.php" method="POST">
                <div class="overflow-hidden sm:rounded-md ">
                    <p class="grid grid-cols-2 gap-2 text-4xl font-bold p-2 bg-gray-800 text-white pl-5">Client Form
                        <a href="home" class="place-self-end"><svg class="h-10 w-10 p-1 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg></a>
                    </p>
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <!--first name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" required name="first_name" id="first_name" autocomplete="given-name" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--last name-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" required name="last_name" id="last_name" autocomplete="family-name" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--tel-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tel_number" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <input type="text" required name="tel" id="tel" autocomplete="tel-number" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--email-->
                            <div class="col-span-6 sm:col-span-4">
                                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="text" required name="email" id="email" autocomplete="email" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--street address-->
                            <div class="col-span-6">
                                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                                <input type="text" required name="street_address" id="street_address" autocomplete="street-address" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--city-->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" required name="city_address" id="city_address" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--job type-->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                                <input type="text" required name="job_type" id="job_type" autocomplete="G.P.S" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!--form of contact-->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">Form of Contact</label>
                                <input type="text" required name="contact" id="contact" autocomplete="Call" class="p-1 bg-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-100 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border  text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-800">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <footer class="footer"><?php include_once('hfooter.php'); ?></footer>
</body>