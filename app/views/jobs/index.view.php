<?php get_template_part('header'); ?>

<section>

  <h1 class="container font-secondary text-6xl font-bold text-blue-900 mt-10">Jobs</h1>

  <div class="container pt-10 pb-16 flex flex-col justify-start items-stretch gap-6">

    <?php get_template_part('search'); ?>

    <?php if ($_GET) : ?>
    
    <a 
      href="<?php echo no_query_strings(); ?>"
      class="block px-5 py-2 text-sm font-semibold rounded bg-orange-500 max-w-max text-white"
    >Clear Filters</a>

    <?php endif; ?>

    <?php if (!empty($jobs)) : ?>

      <?php foreach ($jobs as $job) : ?>
        
        <?php $titleSlug = Core\Slugifier::slugify($job['title']); ?>

        <article
        role="article"
        aria-labelledby="job--<?php echo "{$titleSlug}-{$job['id']}"; ?>" 
        class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
          
          <p class="block text-sm font-bold text-neutral-500">
            <?php echo $job['company_name']; ?>
          </p>

          <a 
          href="<?php echo "/job/{$job['id']}"; ?>"
          class="block w-max text-gray-900 hover:text-orange-500 transition-all"
          >
              <h3 
              id="job--<?php echo "{$titleSlug}-{$job['id']}"; ?>"
              class="font-secondary text-3xl font-bold"
              ><?php echo $job['title']; ?></h3>
          </a>

          <p class="mb-2 mt-3 font-bold text-md text-neutral-500">starts at: <span class="text-white text-lg inline-block px-2 leading-normal rounded bg-orange-500 align-middle"><?php echo job_salary($job['salary'], $job['salary_type']); ?></span></p>

          <div class="mb-3 font-normal text-gray-700 text-md leading-tight">
            <?php echo excerpt($job['description'], 500); ?>
          </div>

          <?php
            $skills = explode(', ', $job['skillset']);
            if (!empty($skills)) :
          ?>

          <ul aria-label="Skills" class="flex justify-start items-start flex-wrap gap-1 mb-6">

            <?php 
              /** show only a maximum of 10 skills */
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

          <div class="flex justify-start items-start flex-wrap gap-x-3 gap-y-4 mt-5">

            <a href="<?php echo "/job/{$job['id']}"; ?>" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-white bg-blue-700 rounded hover:bg-orange-500 border border-solid border-blue-700 hover:border-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all">
                <span class="font-bold">Read more</span>
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" role="presentation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>

            <a href="<?php echo "/job/{$job['id']}/apply"; ?>" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-blue-700 bg-transparent rounded border border-solid border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all">
              <span class="font-bold">Apply Now</span>
              <svg class="w-3.5 h-3.5 ml-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" width="18" height="18" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
              </svg>
            </a>

          </div>

        </article>

      <?php endforeach; ?>
    <?php else : ?>

      <?php if ($_GET) : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary">No jobs listed yet under your query...</p>
      <?php else : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary">No jobs listed yet...</p>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>

<?php get_template_part('footer'); ?>