<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div class="container max-w-[52rem] text-gray-200">
    <div class="rounded-xl border-2 border-solid border-gray-300 py-6 px-10 overflow-auto has-overlay-light relative overflow-hidden">

      <img src="https://picsum.photos/200/200" alt="<?php echo "Photo of {$jobseeker['name']}"; ?>" loading="lazy" width="200" height="200" class="rounded-full ml-5 mb-5 lg:float-right max-w-full max-h-auto aspect-ratio">

      <h1 class="text-5xl font-bold font-secondary pl-5 border-l-solid border-gold border-l-8 mb-3 text-white"><?php echo $jobseeker['name']; ?></h1>

      <p class="mb-5"><?php echo $jobseeker['position']; ?></p>

      <ul aria-label="Jobseeker's Profile" class="mb-10">
        
        <li>
          <span class="text-md font-light">Rate:</span> <strong class="font-bold text-lg"><?php echo job_salary($jobseeker['rate'], $jobseeker['salary_type']); ?></strong>
        </li>
        <li>
        <span class="text-md font-light">Email:</span> <a class="font-bold text-lg hover:text-blue-500 transition-all hover:underline underline-offset-2" href="mailto:<?php echo trim($jobseeker['email']); ?>"><?php echo $jobseeker['email']; ?></a>
        </li>

      </ul>

      <hr class="bg-gray-200 mb-5">

      <div class="text-gray-200 text-lg font-medium">
        <?php echo maintain_breaks($jobseeker['summary']); ?>
      </div>

      <h2 class="text-2xl my-6 mb-3 font-secondary font-bold">Experience/Background</h2>

    </div>
  </div>
</section>

<?php get_template_part('footer'); ?>