<?php get_template_part('header'); ?>

<style>
  @media screen and (min-width: 1024px) {
    #job-details {
      grid-template-columns: 3fr 1fr;
    }
  }
</style>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div id="job-details" class="container grid grid-cols-1 gap-3">

    <article role="article" class="p-4 rounded-lg border border-gray-400 border-2">

      <h1 class="text-gold text-3xl lg:text-6xl font-bold font-secondary mb-4">
        <?php echo htmlspecialchars($job['title']); ?>
        <small class="text-sm block lg:inline text-white font-primary">(<span class="font-light">open until</span> <?php echo date('F d Y', strtotime($job['date_end'])); ?>)</small>
      </h1>

      <hr class="mb-4 border-gray-100 opacity-70">

      <p class="font-bold text-gray-100 text-2xl mb-1">
        <span class="font-semibold text-sm inline-block align-middle">Salary Offer:&nbsp;</span>
        <span class="inline-block align-middle">
          <?php echo job_salary(htmlspecialchars($job['salary']), htmlspecialchars($job['salary_type'])); ?>
        </span>
      </p>
      <p>
        <span class="font-semibold text-gray-100 text-sm inline-block align-middle">Skills Required:&nbsp;</span>
        <?php
          $skills = explode(', ', $job['skillset']);
          if (!empty($skills)) :
        ?>
        <span class="inline-flex flex-wrap gap-1 justify-start items-start align-middle">

          <?php foreach($skills as $skill) : ?>
            <small class="inline-block px-2 font-semibold text-sm rounded bg-gray-600 text-neutral-50 transition-all tracking-widest">
              <?php echo ucwords(htmlspecialchars($skill)); ?>
            </small>
          <?php endforeach; ?>

        </span>
        <?php endif; ?>
      </p>

      <hr class="mt-8 mb-6 border-gray-100 opacity-70">    

      <div class="text-gray-200 text-xl font-medium">
        <h2 class="mt-6 mb-3 font-secondary text-3xl font-bold text-gray-200">Job Description</h2>
        <?php echo maintain_breaks($job['description']); ?>
      </div>

      <?php if (isset($job['benefits']) && strlen($job['benefits'])) : ?>
      <div class="text-gray-200 text-xl font-medium">
        <h2 class="mt-6 mb-3 font-secondary text-3xl font-bold text-gray-200">Benefits</h2>
        <?php echo maintain_breaks($job['benefits']); ?>
      </div>
      <?php endif; ?>

      <?php if (is_jobseeker()) : ?>
      <div class="flex justify-start items-start gap-4 flex-wrap mt-12">

        <a 
        href="<?php echo $job['application_link']; ?>" 
        class="transition-all inline-flex justify-center items-center font-bold py-1 px-6 bg-gold border border-solid border-gold hover:border-blue-900 text-black hover:bg-blue-900 text-xl min-w-[8em] text-black hover:text-white"
        >
          Apply
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill ml-2" viewBox="0 0 16 16" aria-hidden="true" role="presentation">
            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
          </svg>
        </a>

      </div>
      <?php endif; ?>

      <?php if (is_jobseeker()) : ?>
      <hr class="border-2 border-solid border-red-500 max-w-[120px] mt-10">

      <p class="font-normal text-sm text-gray-100 italic mt-3"><strong class="font-bold uppercase">Always Remember!</strong> You should <strong class="font-bold">NEVER</strong> have to pay anything just to be accepted for a job. You <strong class="font-bold">SHOULD NOT</strong> be paying any fees at all. Employers asking you to do some sort of payment before proceeding (or during any aspects of your interaction) is a <strong class="font-bold">SCAM</strong>!</p>
      <?php endif; ?>

    </article>

    <!-- sidebar -->
    <?php get_template_part('jobs-sidebar', [
      'job' => $job
    ]) ?>

  </div>
</section>

<?php get_template_part('footer'); ?>