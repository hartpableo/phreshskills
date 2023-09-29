<form method="GET" id="jobseekers-search-filter" class="w-full flex flex-col lg:grid auto-cols-fr grid-cols-4 justify-start items-end gap-x-5 gap-y-3 mt-10">
  <div>
    <label for="title-position" class="text-white text-sm font-semibold">Search Positions</label>
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

  <?php if (!empty($all_skills)) : ?>
  <div>
    <p class="text-white text-sm font-semibold leading-tight">
      Filter Skills
    </p>
    <?php if (isset($_GET['skills']) && !empty($_GET['skills'])) : ?>
      <div class="text-white text-sm font-semibold leading-tight">
        <?php echo '( ' . implode(', ', $_GET['skills']) . ' )' ?>
      </div>
    <?php endif; ?>

    <div class="relative">

      <button aria-label="Filter Skills" type="button" data-target="#filter-skills-dropdown" class="block w-full p-4 font-light text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 text-neutral-400" aria-expanded="false">- Select the skills you are looking for -</button>

      <div id="filter-skills-dropdown" class="absolute w-full top-full flex flex-col justify-start items-stretch p-2 rounded-lg bg-white py-3 px-4 shadow-lg border border-solid border-gray-800 max-h-[28.125rem] overflow-hidden overflow-y-scroll hidden">

        <?php foreach ($all_skills as $skill) : ?>

          <?php $skill_slug = Core\Slugifier::slugify($skill); ?>

          <label for="skill--<?php echo $skill_slug; ?>"
            class="py-2 border-b border-solid border-gray-200 text-neutral-700 hover:text-gold transition-all"
          >
            <input 
            type="checkbox"
            class="inline-block align-top mt-1"
            name="skills[]" 
            id="skill--<?php echo $skill_slug; ?>" 
            value="<?php echo $skill; ?>"
            <?php if (isset($_GET['skills']) && in_array(strtolower($skill), $_GET['skills'])) echo 'checked'; ?>
            >
            <span class="align-top inline-block leading-tight ml-2 font-semibold cursor-pointer"><?php echo ucfirst($skill); ?></span>
          </label>

        <?php endforeach; ?>

      </div>

    </div>

    <?php endif; ?>

  </div>
  <!-- Submit -->
  <div class="flex flex-col justify-end items-center h-full">
    <button type="submit" class="w-full font-bold text-white bg-blue-500 hover:bg-gold transition-all focus:ring-4 focus:outline-none focus:ring-blue-300 rounded text-md lg:text-xl px-4 py-3 hover:text-black">Search</button>
  </div>
</form>

<script>
  const filterSkillsButton = document.querySelector('button[data-target="#filter-skills-dropdown"]');
  const skillsDropdown = document.querySelector(filterSkillsButton.dataset.target);

  document.addEventListener('DOMContentLoaded', () => {

    filterSkillsButton.addEventListener('click', () => {

      let dropdownIsExpanded = filterSkillsButton.getAttribute('aria-expanded') == 'true';

      if (!dropdownIsExpanded) {
        skillsDropdown.classList.remove('hidden');
        filterSkillsButton.setAttribute('aria-expanded', true);
      } else {
        skillsDropdown.classList.add('hidden');
        filterSkillsButton.setAttribute('aria-expanded', false);
      }

      event.stopPropagation();

    }, { passive: true })

    document.addEventListener('click', (event) => {
      const target = event.target;
      const isInsideDropdown = skillsDropdown.contains(target);

      if (!isInsideDropdown) {
        skillsDropdown.classList.add('hidden');
        filterSkillsButton.setAttribute('aria-expanded', false);
      }
    }, { passive: true });

  }, { passive: true })
</script>