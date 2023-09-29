<?php get_template_part('header'); ?>

<section id="hero">
  <div class="has-overlay relative max-w-[1536px] bg-fixed bg-center bg-cover mx-auto px-3 text-center relative overflow-hidden isolate bg-black py-20 lg:py-9 text-white min-h-[35vh] md:min-h-[45vh] flex flex-col justify-center items-center text-md lg:text-lg" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

    <h1 
    class="font-secondary text-4xl lg:text-6xl font-bold mb-8"
    >Welcome to <span class="text-orange-500"><?php echo APP_NAME; ?></span>!</h1>
    
    <p class="max-w-2xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat natus incidunt recusandae, enim quisquam perspiciatis veniam dolore in accusamus officiis!</p>

    <div class="flex justify-center items-start gap-4 flex-wrap mt-12">

      <a 
      href="/jobs" 
      class="transition-all inline-flex justify-center items-center font-bold py-2 px-6 bg-orange-500 border border-solid border-orange-500 hover:border-blue-900 text-white hover:bg-blue-900 text-xl min-w-[12em]"
      >View Jobs</a>

      <!-- <a 
      href="/jobs/create" 
      class="transition-all inline-flex justify-center items-center font-bold py-2 px-6 bg-transparent border border-solid border-white text-white hover:border-blue-900 hover:bg-blue-900 text-xl min-w-[12em]"
      >Post Jobs</a> -->
      <a 
      href="/jobseekers" 
      class="transition-all inline-flex justify-center items-center font-bold py-2 px-6 bg-transparent border border-solid border-white text-white hover:border-blue-900 hover:bg-blue-900 text-xl min-w-[12em]"
      >View Jobseekers</a>

    </div>

  </div>
</section>

<section id="jobseekers-list" class="py-20">

  <h2 class="container font-secondary text-6xl mb-20 font-bold text-blue-900">Jobseekers</h2>

  <?php if (!empty($jobseekers)) : ?>

  <!-- Jobseekers Grid -->
  <div class="container grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
  
    <?php foreach ($jobseekers as $jobseeker) : ?>

    <?php $nameSlug = Core\Slugifier::slugify($jobseeker['name']); ?>
      
    <article
    role="article"
    aria-labelledby="title--<?php echo $nameSlug; ?>"
    class="block bg-blue-100 text-left mb-20 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] p-6">

      <img src="https://picsum.photos/200/200" width="200" height="200" alt="..." 
        class="rounded-full w-[6.6rem] h-[6.6rem] mt-[-4.85rem] mb-3" aria-hidden="true" role="presentation">

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
        
        <li class="inline-block p-1 px-2 font-semibold text-xs rounded bg-gray-500 text-neutral-50 transition-all">
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
          class="pointer-events-auto inline-block cursor-pointer rounded text-base font-bold leading-normal text-primary text-blue-500 transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 hover:text-orange-500 hover:border-orange-500 transition-all px-2 border-2 border-solid border-blue-500 rounded transition-all">
          View <span class="sr-only"><?php echo $jobseeker['name'] ?>'s </span>Profile
        </a>
      </div>
    </article>
    
    <?php endforeach; ?>
  
  </div>

  <!-- End of Jobseekers Grid -->

  <?php endif; ?>

  <div class="mt-5 flex gap-x-2 gap-y-3 justify-center items-start flex-wrap">

    <a 
    href="/jobseekers"
    class="inline-flex px-10 py-2 text-xl font-bold text-white bg-blue-900 hover:bg-orange-500 rounded transition-all"
    >View More Jobseekers</a>

  </div>

</section>

<?php get_template_part('footer'); ?>