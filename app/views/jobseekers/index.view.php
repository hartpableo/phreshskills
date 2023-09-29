<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

  <h1 class="container font-secondary text-6xl font-bold text-gold mt-10">Jobseekers</h1>

  <div class="container">

    <?php get_template_part('jobseekers-search-filter', [
      'all_skills' => $all_skills
    ]); ?>

    <?php if ($_GET) : ?>
    <a 
      href="<?php echo no_query_strings(); ?>"
      class="block mt-5 px-5 py-2 text-sm font-semibold rounded bg-gold max-w-max text-black"
    >Clear Filters</a>
    <?php endif; ?>

    <?php if (!empty($jobseekers)) : ?>

    <!-- Jobseekers Grid -->
    <div class="container grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 pt-32">

      <?php foreach ($jobseekers as $jobseeker) : ?>

      <?php $nameSlug = Core\Slugifier::slugify(htmlspecialchars($jobseeker['name'])); ?>
        
      <article
      role="article"
      aria-labelledby="title--<?php echo $nameSlug; ?>"
      class="block bg-gray-900 text-left mb-20 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] p-6 border border-solid border-gold">

        <img src="https://picsum.photos/200/200" width="200" height="200" alt="..." 
          class="rounded-full w-[6.6rem] h-[6.6rem] mt-[-4.85rem] mb-3 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]" aria-hidden="true" role="presentation">

        <h3
          id="title--<?php echo $nameSlug; ?>"
          class="mb-1 text-2xl font-bold leading-tight font-secondary">
          <a href="<?php echo "/jobseeker/{$jobseeker['id']}"; ?>" class="text-white hover:text-black transition-all"><?php echo htmlspecialchars($jobseeker['name']); ?></a>
        </h3>
        <p
          class="mb-3 text-md font-semibold leading-tight text-neutral-400">
          <?php echo htmlspecialchars($jobseeker['position']); ?>
        </p>
        <p
          class="mb-2 text-base leading-tight text-neutral-100">
          <?php echo excerpt(htmlspecialchars($jobseeker['summary']), 125); ?>
        </p>

        <?php
          $skills = explode(', ', $jobseeker['skills']);
          if (!empty($skills)) :
        ?>

        <ul aria-label="Skills" class="flex justify-start items-start flex-wrap gap-2 my-5">
          
          <?php 
            /** show only a maximum of 9 skills */
            $counter = 0;
            foreach($skills as $skill) : 
            if ($counter == 9) break;
          ?>
          
          <li class="inline-block p-1 px-2 font-semibold text-xs rounded bg-gray-800 text-neutral-200 transition-all tracking-widest">
            <?php echo ucwords($skill); ?>
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
            class="pointer-events-auto inline-block cursor-pointer rounded text-base font-bold leading-normal text-primary text-gold transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 hover:text-blue-300 hover:border-blue-300 transition-all px-5 py-1 border-2 border-solid border-gold rounded transition-all">
            View <span class="sr-only"><?php echo htmlspecialchars($jobseeker['name']); ?>'s </span>Profile
          </a>
        </div>
      </article>
      
      <?php endforeach; ?>

    </div>

    <!-- End of Jobseekers Grid -->

    <?php else : ?>

      <?php if ($_GET) : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary text-white">No jobseekers available yet under your query...</p>
      <?php else : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary text-white">No jobseekers available yet...</p>
      <?php endif; ?>

    <?php endif; ?>    

  </div>
</section>

<?php get_template_part('footer'); ?>