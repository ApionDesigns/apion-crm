<div x-data="{ dropdownOpen: false }" class="grid justify-items-center">

  <div class="search m-3 rounded-md w-auto flex items-center">
    <input @click="dropdownOpen = !dropdownOpen" class="p-1 pl-4 rounded-full w-96 border border-gray-200 focus:outline-none text-sm placeholder-opacity-25 placeholder-gray-500" type="text" placeholder="Type to search...">
    <button class="fas fa-search bg-green-600 hover:bg-green-800 p-1.5 rounded-r-full -ml-5" style="position: relative;">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
      </svg></button>
  </div>
  <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
  <div x-show="dropdownOpen" class="absolute w-96 bg-white shadow-xl z-20 mt-11">
    <div class="users-list">
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="javascript/search.js"></script>