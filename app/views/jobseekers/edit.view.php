<?php
use Core\Router;
get_template_part('header');
?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div class="container">

  <form action="/jobseeker/update" method="POST" class="container max-w-xl my-8 lg:mt-10 lg:mb-16" enctype="multipart/form-data">

    <h1 class="font-bold text-3xl lg:text-4xl font-secondary text-gold mb-8">Update/Edit Your Profile</h1>

    <input type="hidden" name="id" value="<?php echo $jobseeker['id']; ?>">
    <input type="hidden" name="original_profile_photo" value="<?php echo $jobseeker['profile_photo']; ?>">
    <input type="hidden" name="_method" value="PATCH">

    <div class="mb-4">
      <label for="name" class="block text-gray-200 font-secondary text-sm">Name</label>
      <input type="text" id="name" name="name" class="border border-solid rounded-sm border-gray-500 block w-full p-1" placeholder="e.g. John Doe" value="<?php echo original_data($jobseeker, 'name'); ?>">
      <?php if (has_error('name')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('name'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="email" class="block text-gray-200 font-secondary text-sm">Email Address</label>
      <input type="text" id="email" name="email" class="border border-solid rounded-sm border-gray-500 block w-full p-1" placeholder="e.g. johndoe@google.com" value="<?php echo original_data($jobseeker, 'email') ?>">
      <?php if (has_error('email')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('email'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="position" class="block text-gray-200 font-secondary text-sm">Position</label>
      <input type="text" id="position" name="position" class="border border-solid rounded-sm border-gray-500 block w-full p-1" placeholder="e.g. Email Marketing Specialist" value="<?php echo original_data($jobseeker, 'position'); ?>">
      <?php if (has_error('position')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('position'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <img src="<?php echo file_uri($jobseeker['profile_photo']); ?>" id="preview-image" width="120" height="120" loading="lazy" style="object-fit: cover;object-position: center;" aria-hidden="true">
      <label for="profile_photo" class="form-label block mt-2 text-gray-200">Profile Picture</label>
      <input class="form-control text-gray-200 border border-solid border-gray-200 cursor-pointer" type="file" id="profile_photo" accept="image/*" name="profile_photo">
      <?php if (has_error('profile_photo_validation')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('profile_photo_validation'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="summary" class="block text-gray-200 font-secondary text-sm">About Me</label>
      <textarea id="summary" name="summary" cols="10" rows="10" class="form-textarea border border-solid rounded-sm border-gray-500 block w-full p-1 resize-vertical" placeholder="Not sure yet what to write? Highlight interesting things about you! :)"><?php echo original_data($jobseeker, 'summary'); ?></textarea>
      <?php if (has_error('summary')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('summary'); ?></p>
      <?php endif; ?>
    </div>

    <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-5">

        <div class="flex-grow">

          <label for="rate" class="block text-gray-200 font-secondary text-sm">Expected Salary (<span class="sr-only">in US Dollars</span><strong class="font-bold" aria-hidden="true">$</strong>)</label>

          <div class="relative">

            <input type="number" step="0.01" min="2.5" id="rate" name="rate" class="border border-solid rounded-sm border-gray-500 block w-full p-1 pl-6" value="<?php echo original_data($jobseeker, 'rate'); ?>">

            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-currency-dollar absolute top-1/2 left-1" style="transform: translateY(-50%);" viewBox="0 0 16 16" aria-hidden="true" role="presentation">
              <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
            </svg>

          </div>

        </div>

        <div class="min-w-[8rem]">

          <label for="salary_type" class="block text-gray-200 font-secondary text-sm">Salary Type</label>

          <select name="salary_type" id="salary_type" class="bg-gray-50 border border-gray-700 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1 font-primary min-h-[2.125rem]">
            <?php foreach (SALARY_TYPES as $type) : ?>
              <option 
                value="<?php echo strtolower($type); ?>"
                <?php if (isset($_POST['salary_type']) && $_POST['salary_type'] == strtolower($type)) echo 'selected'; ?>
              ><?php echo ucfirst($type); ?></option>
            <?php endforeach ?>
          </select>

        </div>

    </div>

    <?php if (has_error('rate')) : ?>
      <p class="text-xs text-red-400 font-semibold mt-1 w-full mb-4"><?php echo get_error('rate'); ?></p>
    <?php endif; ?>

    <div class="mb-4">
        <label for="skills" class="block text-gray-200 font-secondary text-sm">Skillset<br> <span class="text-xs">(separate by commas, e.g "Facebook Ads, Canva Design, Photoshop")</span></label>
        <textarea id="skills" name="skills" id="skills" cols="30" rows="2" class="form-textarea border border-solid rounded-sm border-gray-500 block w-full p-1 resize-vertical resize-none" placeholder="e.g. Excel, Canva, Word, Cold Calling, etc."><?php echo original_data($jobseeker, 'skills'); ?></textarea>
        <?php if (has_error('skills')) : ?>
          <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('skills'); ?></p>
        <?php endif; ?>
    </div>

    <div class="mb-4">

      <p class="block font-bold font-secondary text-lg mt-8 mb-5 text-gold">Work Background(s) or Experience(s)</p>

      <div id="repeatable-fields-container">
        <?php
          if (!empty($work_background)) :
            $counter = 1;
            foreach ($work_background as $work) :
              if ($counter == count($work_background) + 1) break;
              $prev_company = $work['company'];
              $prev_position = $work['position'];
              $prev_work_duration = $work['duration'];
        ?>

        <div class="repeatable-field overflow-hidden rounded-md has-overlay-light relative p-3 mb-4 border-2 border-solid border-gray-200 border-b-2">
          <label class="block text-gray-200 font-secondary text-sm mb-2">Company Name:
            <input type="text" name="work_background[company][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. Google, Netflix, etc." value="<?php echo $prev_company; ?>">
          </label>
          <label class="block text-gray-200 font-secondary text-sm mb-2">Position:
            <input type="text" name="work_background[position][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. Web Designer, Virtual Assistant, etc." value="<?php echo $prev_position; ?>">
          </label>
          <label class="block text-gray-200 font-secondary text-sm mb-2">How long did you work for this company?
            <input type="text" name="work_background[duration][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. March 2022 - April 2023" value="<?php echo $prev_work_duration; ?>">
          </label>
        </div>

      <?php
            $counter++;
          endforeach;
        else :
      ?>

      <div id="repeatable-fields-container">
        <div class="repeatable-field overflow-hidden rounded-md has-overlay-light relative p-3 mb-4 border-2 border-solid border-gray-200 border-b-2">
          <label class="block text-gray-200 font-secondary text-sm mb-2">Company Name:
            <input type="text" name="work_background[company][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. Google, Netflix, etc.">
          </label>
          <label class="block text-gray-200 font-secondary text-sm mb-2">Position:
            <input type="text" name="work_background[position][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. Web Designer, Virtual Assistant, etc.">
          </label>
          <label class="block text-gray-200 font-secondary text-sm mb-2">How long did you work for this company?
            <input type="text" name="work_background[duration][]" class="border border-solid rounded-sm border-gray-500 block w-full p-1 text-neutral-700" placeholder="e.g. March 2022 - April 2023">
          </label>
        </div>
      </div>

      <?php endif; ?>
      
      </div>

      <div class="flex justify-end">
        <button id="add-field-button" type="button" aria-label="Add a field for work background" class="bg-gold overflow-hidden rounded hover:bg-blue-300 transition-all p-1" title="Add New Field">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16" role="presentation" aria-hidden="true">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg>
        </button>
      </div>

    </div>

    <div class="mt-8">
      <button type="submit" class="inline-block align-middle bg-blue-900 text-white px-6 py-2 rounded hover:bg-gold transition-all hover:text-black text-lg font-bold">Submit</button>
      <?php
        $router = new Router();
        $prev_url = $router->prevURL();
      ?>
      <p class="ml-2 inline-block align-middle font-semibold text-gray-200"><a href="<?php echo $prev_url; ?>" class="text-red-400 hover:underline">Go Back</a></p>
    </div>

    </form>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const workExperienceContainer = document.getElementById('repeatable-fields-container');
    const addWorkExperienceButton = document.getElementById('add-field-button');

    addWorkExperienceButton.addEventListener('click', function () {
      const clone = workExperienceContainer.firstElementChild.cloneNode(true);
      const inputs = clone.querySelectorAll('input');
      inputs.forEach(input => input.value = '');
      workExperienceContainer.appendChild(clone);
    });
  });
</script>

<script>
  window.addEventListener('load', () => {
    (imageInput) && imageInput.addEventListener('change', previewSelectedImage);
  }, {passive: true})

  // preview image on upload
  const imageInput = document.getElementById('profile_photo');
  const previewImage = document.getElementById('preview-image');

  function previewSelectedImage() {
    const file = imageInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function(e) {
        previewImage.src = e.target.result;
      }
    }
  }
</script>

<?php get_template_part('footer'); ?>