<section>
  <header>
    <div class="content">
      <?php
      $sql = mysqli_query($conn, "SELECT * FROM clients");
      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      }
      ?>
    </div>
  </header>
  <div x-data="{ dropdownOpen: false }" class="grid grid-cols-2 relative">

    <div @click="dropdownOpen = !dropdownOpen" class="search bg-white m-3 rounded-md w-auto">
      <input mouseleave class="p-1 rounded-md w-20 md:w-auto border border-gray-200 focus:outline-none" type="text" placeholder="Search...">
      <button class="fas fa-search" style="display: none;"></button>
    </div>
    <div x-show="dropdownOpen" class="absolute mt-12 ml-3 bg-white rounded-md shadow-lg overflow-hidden z-20 w-20 md:w-auto">
      <div class="users-list w-44">
      </div>
    </div>
  </div>
</section>



<script src="javascript/search.js"></script>