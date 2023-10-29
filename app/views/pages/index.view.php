<?php get_template_part('header'); ?>

<section id="hero" class="has-overlay bg-fixed bg-center bg-cover relative isolate py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">

  <div class="relative mx-auto px-3 text-center relative overflow-hidden isolate py-20 lg:py-9 text-white min-h-[35vh] md:min-h-[40vh] h-full flex flex-col justify-center items-center text-md lg:text-lg">

    <h1 
    id="site-title"
    class="font-secondary text-4xl lg:text-7xl font-bold mb-8"
    >Welcome to <span class="text-gold"><?php echo APP_NAME; ?></span>👋🏻!</h1>
    
    <p class="max-w-2xl text-xl">This platform was made to help <span class="text-gold font-bold">Filipinos</span> jump-start their careers and for <span class="text-blue-500 font-bold">companies or businesses worldwide</span> to find the right individual for their team!</p>

    <div class="flex justify-center items-start gap-4 flex-wrap mt-12">

      <a 
      href="<?php echo is_employer() ? '/jobs/create' : '/employer/login' ?>"
      class="transition-all inline-flex justify-center items-center font-bold py-2 px-6 bg-gold border border-solid border-gold hover:border-blue-900 text-black hover:bg-blue-900 text-xl min-w-[12em] text-black hover:text-white"
      >Post a Job</a>

      <a 
      href="<?php echo (is_employer()) ? '/jobseekers' : '/jobs'; ?>" 
      class="transition-all inline-flex justify-center items-center font-bold py-2 px-6 bg-transparent border border-solid border-white text-white hover:border-blue-900 hover:bg-blue-900 text-xl min-w-[12em]"
      ><?php echo (is_employer()) ? 'View Jobseekers' : 'Apply To Jobs'; ?></a>

    </div>

    <div class="flex justify-center items-start lg:items-center gap-4 flex-wrap mt-16">

      <?php if (!auth()) : ?>
      <a 
        href="/employer/register"
        class="underline underline-offset-4 font-bold hover:text-gold transition-all text-sm"
        >Register as Employer</a>
      |
      <a 
        href="/jobseeker/create-profile"
        class="underline underline-offset-4 font-bold hover:text-blue-500 transition-all text-sm"
        >Register as Jobseeker</a>
      |
      <?php endif; ?>
      <a 
      href="mailto:pableoh@gmail.com?subject=Hello%20from%20Phreshskills:"
      class="underline underline-offset-4 font-bold hover:text-red-400 transition-all text-sm"
      >Contact Developer</a>

    </div>

  </div>
</section>

<?php get_template_part('footer'); ?>