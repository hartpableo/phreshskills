<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

  <form action="/jobseeker/authenticate" method="POST" class="container max-w-xl my-8 lg:mt-10 lg:mb-16">

    <h1 class="font-bold text-3xl lg:text-4xl font-secondary text-gold mb-8">Jobseeker's Log In</h1>

    <div class="mb-4">
      <label for="email" class="block text-gray-200 font-secondary text-sm">Email Address</label>
      <input type="text" id="email" name="email" class="border border-solid rounded-sm border-gray-500 block w-full p-1" placeholder="e.g. johndoe@google.com" value="<?php echo old('email') ?? '' ?>">
      <?php if (has_error('email')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('email'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mb-4">
      <label for="password" class="block text-gray-200 font-secondary text-sm">Password</label>
      <input type="password" id="password" name="password" class="border border-solid rounded-sm border-gray-500 block w-full p-1">
      <?php if (has_error('password')) : ?>
        <p class="text-xs text-red-400 font-semibold mt-1"><?php echo get_error('password'); ?></p>
      <?php endif; ?>
    </div>

    <div class="mt-8">
      <button type="submit" class="inline-block align-middle bg-blue-900 text-white px-6 py-2 rounded hover:bg-gold transition-all hover:text-black text-lg font-bold">Log in</button>
      <p class="ml-2 inline-block align-middle font-semibold text-gray-200">Don't have an account yet? <a href="/jobseeker/create-profile" class="text-red-400 hover:underline">Sign up here</a>.</p>
    </div>

  </form>

</section>

<?php get_template_part('footer'); ?>