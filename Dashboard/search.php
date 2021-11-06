<div x-data="{ dropdownOpen: false }" class="grid justify-items-center">

  <div class="search rounded-md w-auto flex items-center">
    <input @click="dropdownOpen = !dropdownOpen" class="p-2 pl-4 rounded-full w-96 focus:outline-none text-sm placeholder-opacity-25 text-white placeholder-gray-500 bg-gray-800" type="text" placeholder="Type to search...">
    <button class=""></button>
  </div>
  <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full"></div>
  <div x-show="dropdownOpen" class="absolute w-96 bg-gray-100 shadow-xl justify-self-center mt-10 rounded-md">
    <div class="users-list p-2">
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="javascript/search.js"></script>