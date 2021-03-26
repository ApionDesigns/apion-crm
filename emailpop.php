<form action="mail.php" method="POST" class="flex items-center justify-center">
    <div class="flex flex-col">
        <div class="py-6 px-14 bg-gradient-to-tr from-gray-800 to-gray-500 rounded-tl-2xl rounded-tr-2xl text-center space-y-8">
            <h2 class="text-white text-xs uppercase">Send client quick message</h2>
        </div>
        <div class="flex flex-col py-6 px-8 space-y-5 bg-white">
            <input type="text" name="name" placeholder="Client Name" class="px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-transparent" />
            <input type="text" name="email" placeholder="Recipient Email" class="px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-transparent" />
            <input type="text" name="subject" placeholder="Subject" class="px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-transparent" />
            <textarea type="text" name="message" placeholder="Enter message" class="px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-transparent"></textarea>
            <button class="w-full py-3 bg-gray-500 hover:bg-gray-800 text-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent shadow-lg">Mail</button>
            <span class="text-center text-gray-400 text-sm">or use email form</span>
        </div>
    </div>
</form>