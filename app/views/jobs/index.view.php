<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full before:opacity-90" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

  <h1 class="container font-secondary text-4xl lg:text-6xl font-bold text-gold">Jobs</h1>

  <div class="container py-3 lg:pt-10 lg:pb-16 flex flex-col justify-start items-stretch gap-6">

    <?php get_template_part('jobs-search-filter'); ?>

    <?php if ($_GET) : ?>
    
    <a 
      href="<?php echo no_query_strings(); ?>"
      class="block px-5 py-2 text-sm font-semibold rounded bg-gold max-w-max text-black"
    >Clear Filters</a>

    <?php endif; ?>

    <?php if (!empty($jobs)) : ?>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">

      <?php foreach ($jobs as $job) : ?>
        
        <?php $titleSlug = Core\Slugifier::slugify(htmlspecialchars($job['title'])); ?>

        <article
        role="article"
        aria-labelledby="job--<?php echo "{$titleSlug}-{$job['id']}"; ?>" 
        class="p-4 bg-[rgba(255,255,255,0.7)] border border-gold border-2 rounded-lg shadow-lg">
          
          <p class="block text-md font-bold text-neutral-900 tracking-wider mb-3">
            <span id="employer--<?php echo $job['id'] . strtotime($job['date_published']); ?>"><?php echo $job['company_name']; ?></span> <span class="font-normal tracking-normal">is hiring!</span>
          </p>

          <h3 
          href="<?php echo "/job/{$job['id']}"; ?>"
          >
              <a
              href="<?php echo "/job/{$job['id']}"; ?>"
              id="job--<?php echo "{$titleSlug}-{$job['id']}"; ?>"
              class="text-black hover:text-gold transition-all font-secondary text-2xl lg:text-3xl font-bold break-words"
              ><?php echo htmlspecialchars($job['title']); ?></a>
          </h3>

          <p class="mb-2 mt-3 font-bold text-md text-neutral-800"><span class="inline-block align-middle">starts at:</span> <span class="text-black text-lg inline-block px-2 leading-normal rounded bg-gold align-middle"><?php echo job_salary($job['salary'], $job['salary_type']); ?></span></p>

          <div class="my-5 font-normal text-gray-900 text-sm lg:text-lg leading-normal lg:leading-snug">
            <?php echo excerpt(htmlspecialchars($job['description']), 500); ?>
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
              $skill = htmlspecialchars($skill);
            ?>

            <li class="inline-block p-1 px-2 font-semibold text-xs rounded bg-gray-700 text-neutral-50 transition-all tracking-widest">
              <?php echo ucwords($skill); ?>
            </li>
            
            <?php
              $counter++;
              endforeach; 
            ?>

          </ul>

          <?php endif; ?>

          <div class="flex justify-start items-start flex-wrap gap-x-3 gap-y-4 mt-8">

            <a href="<?php echo "/job/{$job['id']}"; ?>" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-white bg-blue-700 rounded hover:bg-gold hover:text-black border border-solid border-blue-700 hover:border-gold focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all">
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

      </div>

    <?php else : ?>

      <?php if ($_GET) : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary text-white">No jobs listed yet under your query...</p>
      <?php else : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary text-white">No jobs listed yet...</p>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    let companies = document.querySelectorAll('[id^=employer--]');
    
    if (companies.length > 0) {
      companies.forEach(element => {

        const companyText = element.textContent;

        element.textContent = '';

        for (let i = 0; i < companyText.length; i++) {
          const character = companyText[i];
          if (character === ' ') {
            // If it's a space, create an empty span to maintain spaces
            const spaceSpan = document.createElement("span");
            spaceSpan.textContent = '\u00A0'; // Use a non-breaking space character
            element.appendChild(spaceSpan);
          } else {
            // For non-space characters, create the letter span with the wave effect
            const letterSpan = document.createElement("span");
            letterSpan.textContent = character;
            letterSpan.classList.add("wave-text");
            // Add a delay to each letter's animation
            letterSpan.style.animationDelay = `${i * 0.1}s`; // Adjust the delay as needed
            element.appendChild(letterSpan);
          }
        }

      });
    }
  }, { passive: true })
</script>

<?php get_template_part('footer'); ?>