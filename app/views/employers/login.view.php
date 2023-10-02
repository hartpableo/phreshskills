<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full before:opacity-90" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

  <div class="container">

  <form action="/employer/authenticate" method="POST" class="container max-w-xl my-10 lg:my-16">

    <h1 class="font-bold text-3xl lg:text-5xl font-secondary text-gold mb-8">Employer's Log In</h1>

    <div class="mb-4">
      <label for="company_name" class="block text-gray-200 font-secondary text-sm">Company or Business Name</label>
      <input type="text" id="company_name" name="company_name" class="border border-solid rounded-sm border-gray-500
      block w-full p-1" placeholder="e.g. Texas Best Web Design Agency" value="<?php echo old('company_name') ?? ''; ?>">
      <?php if (has_error('company_name')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('company_name'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="company_email" class="block text-gray-200 font-secondary text-sm">Email Address</label>
      <input type="email" id="company_email" name="company_email" class="border border-solid rounded-sm border-gray-500
      block w-full p-1" placeholder="e.g. recruitment@tbwda.org" value="<?php echo old('company_email') ?? ''; ?>">
      <?php if (has_error('company_email')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('company_email'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="password" class="block text-gray-200 font-secondary text-sm">Password</label>
      <input type="password" id="password" name="password" class="border border-solid rounded-sm border-gray-500
      block w-full p-1">
      <?php if (has_error('password')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('password'); ?></p>
      <?php endif; ?>
    </div>

    <div>
      <button type="submit" class="inline-block align-middle bg-blue-900 text-white px-4 py-2 rounded hover:bg-gold hover:text-black transition-all">Log in</button>
      <p class="ml-2 inline-block align-middle font-semibold text-gray-200">Don't have an account yet? <a href="/employer/register" class="text-red-400 hover:underline">Register here</a>.</p>
    </div>

  </form>

  </div>
</section>

<?php get_template_part('footer'); ?>