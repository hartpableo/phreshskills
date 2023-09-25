<?php get_template_part('header'); ?>

<section>

  <h1 class="container font-secondary text-6xl font-bold text-blue-900 mt-10">Jobseekers</h1>

  <div class="container">

    <?php get_template_part('jobseekers-search-filter', [
      'all_skills' => $all_skills
    ]); ?>

    <?php if ($_GET) : ?>
    <a 
      href="<?php echo no_query_strings(); ?>"
      class="block mt-5 px-5 py-2 text-sm font-semibold rounded bg-orange-500 max-w-max text-white"
    >Clear Filters</a>
    <?php endif; ?>

    <?php if (!empty($jobseekers)) : ?>

    <!-- Jobseekers Grid -->
    <div class="container grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 pt-32">

      <?php foreach ($jobseekers as $jobseeker) : ?>

      <?php $nameSlug = Core\Slugifier::slugify($jobseeker['name']); ?>
        
      <article
      role="article"
      aria-labelledby="title--<?php echo $nameSlug; ?>"
      class="block bg-blue-100 text-left mb-20 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] p-6">

        <img src="https://picsum.photos/200/200" width="200" height="200" alt="..." 
          class="rounded-full w-[6.6rem] h-[6.6rem] mt-[-4.85rem] mb-3 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]" aria-hidden="true" role="presentation">

        <h3
          id="title--<?php echo $nameSlug; ?>"
          class="mb-1 text-2xl font-bold leading-tight font-secondary">
          <a href="<?php echo "/jobseeker/{$jobseeker['id']}"; ?>" class="text-neutral-800 hover:text-orange-500 transition-all"><?php echo $jobseeker['name']; ?></a>
        </h3>
        <p
          class="mb-3 text-md font-semibold leading-tight text-neutral-500 text-blue-900">
          <?php echo $jobseeker['position']; ?>
        </p>
        <p
          class="mb-2 text-base leading-tight text-neutral-800">
          <?php echo excerpt($jobseeker['summary'], 125); ?>
        </p>

        <?php
          $skills = explode(', ', $jobseeker['skills']);
          if (!empty($skills)) :
        ?>

        <ul aria-label="Skills" class="flex justify-start items-start flex-wrap gap-1 mb-2">
          
          <?php 
            /** show only a maximum of 9 skills */
            $counter = 0;
            foreach($skills as $skill) : 
            if ($counter == 9) break;
          ?>
          
          <li class="inline-block">
            <a 
              class="p-1 px-2 font-semibold text-xs rounded bg-gray-500 text-neutral-50 hover:bg-blue-700 transition-all" 
              href="<?php echo "/skills/{$skill}"; ?>"
            ><?php echo ucwords($skill); ?></a>
          </li>

          <?php
            $counter++;
            endforeach; 
          ?>
        
        </ul>

        <?php endif; ?>

        <div class="mt-6 flex justify-start items-start flex-wrap gap-x-4 gap-y-2">
          <a
            href="<?php echo "/jobseeker/{$jobseeker['id']}"; ?>"
            class="pointer-events-auto inline-block cursor-pointer rounded text-base font-bold leading-normal text-primary text-blue-500 transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 hover:text-orange-500 hover:border-orange-500 transition-all px-2 border-2 border-solid border-blue-500 rounded transition-all">
            View <span class="sr-only"><?php echo $jobseeker['name'] ?>'s </span>Profile
          </a>
        </div>
      </article>
      
      <?php endforeach; ?>

    </div>

    <!-- End of Jobseekers Grid -->

    <?php else : ?>

      <?php if ($_GET) : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary">No jobseekers available yet under your query...</p>
      <?php else : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary">No jobseekers available yet...</p>
      <?php endif; ?>

    <?php endif; ?>    

  </div>
</section>

<?php get_template_part('footer'); ?>