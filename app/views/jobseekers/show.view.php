<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div class="container max-w-[52rem] text-gray-200">
    <div class="rounded-xl border-2 border-solid border-gray-300 py-6 px-5 lg:px-10 overflow-auto has-overlay-light relative overflow-hidden">

      <img
        src="<?php echo file_uri($jobseeker['profile_photo']); ?>"
        alt="<?php echo "Photo of {$jobseeker['name']}"; ?>"
        loading="lazy"
        width="200"
        height="200"
        class="rounded-full object-cover ml-5 mb-5 md:float-right max-w-full max-h-auto"
        style="aspect-ratio: 1/1;"
      >

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

      <?php
      $skills = explode(', ', $jobseeker['skills']);
      if (!empty($skills)) :
        ?>
        <p class="mb-3 mt-5">I specialize in:</p>
        <ul aria-label="Skills" class="flex justify-start items-start flex-wrap gap-2 mb-5">

          <?php
          /** show only a maximum of 9 skills */
          $counter = 0;
          foreach($skills as $skill) :
            if ($counter == 9) break;
            ?>

            <li class="inline-block p-1 px-2 font-bold text-xs rounded bg-gray-700 text-neutral-200 transition-all tracking-widest">
              <?php echo ucwords($skill); ?>
            </li>

            <?php
            $counter++;
          endforeach;
          ?>

        </ul>

      <?php endif; ?>

      <?php 
        if (!empty($work_background)) : 
          $counter = 1; 
      ?>
        <h2 class="text-2xl mt-6 mb-5 font-secondary font-bold text-gray-200">Experience/Background</h2>
        <div class="flex flex-col gap-3 justify-start items-stretch pl-5">
        <?php 
          foreach (array_reverse($work_background) as $work) : 
            if ($counter == count($work_background) + 1) break;
        ?>


          <div class="relative text-gray-200">
            <h3 class="text-xl mb-0 leading-none font-bold relative"><?php echo "<span class='text-gray-200 -ml-6 mr-1'>{$counter}.</span>" . htmlspecialchars($work['position']); ?></h3>
            <p class="text-sm text-gray-100"><?php echo htmlspecialchars($work['company']); ?></p>
            <p class="text-sm text-gray-100"><?php echo htmlspecialchars($work['duration']); ?></p>
          </div>

        <?php 
          $counter++; 
          endforeach; 
        ?>
        </div>
      <?php endif; ?>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 justify-center items-stretch mt-16 text-center">

        <?php if (is_employer()) : ?>
          <a href="mailto:<?php echo htmlspecialchars($jobseeker['email']); ?>" class="w-full h-full bg-gold text-black font-bold text-xl hover:bg-blue-500 hover:text-gray-200 transition-all leading-none py-4">Contact <?php echo htmlspecialchars($jobseeker['name']); ?></a>
        <?php endif; ?>

        <?php if (get_current_uid() === \Core\Session::get_current_user()['id']) : ?>
          <a href="/jobseeker/edit-profile" class="w-full h-full bg-gold text-black font-bold text-xl hover:bg-blue-500 hover:text-gray-200 transition-all leading-none py-4">Edit Profile</a>
        <?php endif; ?>

      </div>

    </div>
  </div>
</section>

<?php get_template_part('footer'); ?>