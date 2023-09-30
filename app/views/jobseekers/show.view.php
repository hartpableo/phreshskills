<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div class="container max-w-[52rem] text-gray-200">
    <div class="rounded-xl border-2 border-solid border-gray-300 py-6 px-10 overflow-auto">

      <img src="https://picsum.photos/200/200" alt="<?php echo "Photo of {$jobseeker['name']}"; ?>" loading="lazy" width="200" height="200" class="rounded-full mr-5 mb-5 lg:float-left max-w-full max-h-auto aspect-ratio">

      <h1 class="text-5xl font-bold font-secondary mb-5"><?php echo $jobseeker['name']; ?></h1>

      <ul aria-label="Jobseeker's Profile">
        
        

      </ul>

    </div>
  </div>
</section>

<?php get_template_part('footer'); ?>