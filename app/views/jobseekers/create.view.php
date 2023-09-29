<?php get_template_part('header'); ?>

<section>
  <div class="container">

  <form action="/jobs/add" method="POST" class="container max-w-md my-16">

    <h1 class="font-bold text-5xl font-secondary text-blue-900 mb-8">Create Jobseerker Profile</h1>

    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-secondary text-sm">Name</label>
        <input type="text" id="name" name="name" class="border border-solid rounded-sm border-gray-500 block w-full p-1">
    </div>

    <div class="mb-4 flex flex-col lg:flex-row justify-between lg:items-center gap-5">

        <div class="flex-grow">

          <label for="rate" class="block text-gray-700 font-secondary text-sm">Expected Salary (<span class="sr-only">in US Dollars</span><strong class="font-bold" aria-hidden="true">$</strong>)</label>

            <div class="relative">

              <input type="number" step="0.01" min="2.5" id="rate" name="rate" class="border border-solid rounded-sm border-gray-500 block w-full p-1 pl-6">

              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-currency-dollar absolute top-1/2 left-1" style="transform: translateY(-50%);" viewBox="0 0 16 16" aria-hidden="true" role="presentation">
                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
              </svg>

            </div>

        </div>

        <div class="min-w-[8rem]">

          <label for="salary_type" class="block text-gray-700 font-secondary text-sm">Salary Type</label>

          <select name="salary_type" id="salary_type" class="bg-gray-50 border border-gray-700 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1 font-primary min-h-[2.125rem]">
            <?php foreach ($salary_types as $type) : ?>
              <option value="<?php echo strtolower($type); ?>"><?php echo ucfirst($type); ?></option>
            <?php endforeach ?>
          </select>

        </div>

        <!-- <p class="text-xs text-red-400 font-semibold mt-1">* Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, ab.</p> -->
    </div>

    <div class="mb-4">
        <label for="skillset" class="block text-gray-700 font-secondary text-sm">Skillset<br> <span class="text-xs">(separate by commas, e.g "Facebook Ads, Canva Design, Photoshop")</span></label>
        <textarea id="skillset" name="skillset" id="skillset" cols="30" rows="2" class="form-textarea border border-solid rounded-sm border-gray-500 block w-full p-1 resize-vertical resize-none"></textarea>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-secondary text-sm">Job Description</label>
        <textarea id="description" name="description" cols="10" rows="10" class="form-textarea border border-solid rounded-sm border-gray-500 block w-full p-1 resize-vertical"></textarea>
    </div>

    <div>
      <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-gold transition-all">Submit</button>
    </div>

    </form>

  </div>
</section>

<?php get_template_part('footer'); ?>