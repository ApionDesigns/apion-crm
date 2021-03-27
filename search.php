<div x-data="{ dropdownOpen: false }" class="grid">

  <div @click="dropdownOpen = !dropdownOpen" class="search m-3 rounded-md w-auto flex items-center">
    <input class="p-1 pl-2 rounded-full w-20 md:w-auto border border-gray-200 focus:outline-none" type="text" placeholder="Search">
    <button class="fas fa-search bg-green-600 hover:bg-green-800 p-2 rounded-r-full -ml-5" style="position: relative;">
      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
      </svg></button>
  </div>
  <div x-show="dropdownOpen" class="absolute mt-12 ml-3 bg-white border-white rounded-br-3xl shadow-lg overflow-hidden z-20 w-20 md:w-auto">
    <div class="users-list w-44">
    </div>
  </div>
</div>



<script src="javascript/search.js"></script>