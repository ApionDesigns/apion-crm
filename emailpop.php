<form action="mail.php" method="POST" class="flex items-center justify-center rounded-tl-2xl">
    <div class="flex flex-col">
        <div class="py-6 px-14 bg-green-500 rounded-tl-2xl text-center space-y-8">
            <h2 class="text-white text-xs font-bold uppercase">Send client quick message</h2>
        </div>
        <div class="flex flex-col py-6 px-8 space-y-5 bg-green-400">
            <input type="text" name="name" placeholder="Client Name" class="px-2 py-2 border-2 rounded-md border-white focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" />
            <input type="text" name="email" placeholder="Recipient Email" class="px-2 py-2 border-2 rounded-md border-white focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" />
            <input type="text" name="subject" placeholder="Subject" class="px-2 py-2 border-2 rounded-md border-white focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent" />
            <textarea type="text" name="message" placeholder="Enter message" class="px-2 py-2 border-2 rounded-md border-white focus:outline-none focus:ring-1 focus:ring-green-300 focus:border-transparent"></textarea>
            <button class="w-full py-3 bg-green-600 hover:bg-green-800 text-white rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent shadow-lg">Mail</button>
            <span class="text-center text-white text-sm">or use email form</span>
        </div>
    </div>
</form>