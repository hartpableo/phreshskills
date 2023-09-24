<form method="GET" id="jobseekers-search-filter" class="w-full flex flex-col lg:grid auto-cols-fr grid-cols-4 justify-start items-start gap-x-5 gap-y-3 mt-10">
  <div>
    <label for="title-position" class="text-neutral-500 text-sm font-semibold">Search Positions</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true" role="presentation">
          <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <input 
        type="search"
        name="position" 
        id="title-position" 
        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
        placeholder="E.g. Graphic Designer, Virtual Assistant, etc."
        value="<?php echo $_GET['position'] ?? '' ?>">
    </div>
  </div>
  <div>
    <label for="title-skills" class="text-neutral-500 text-sm font-semibold">Search Skills</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true" role="presentation">
          <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <input 
        type="search"
        name="skills[]" 
        id="title-skills" 
        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
        placeholder="E.g. MS Office, Quickbooks, C++, Photoshop, etc."
        value="<?php echo $_GET['skills'] ?? '' ?>">
    </div>
  </div>
  <!-- Submit -->
  <div class="flex flex-col justify-end items-center h-full">
    <button type="submit" class="w-full font-bold text-white bg-blue-500 hover:bg-orange-500 transition-all focus:ring-4 focus:outline-none focus:ring-blue-300 rounded text-md lg:text-xl px-4 py-3">Search</button>
  </div>
</form>