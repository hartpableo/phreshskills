<?php 

$router = new Core\Router();

get_template_part('header'); 

?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <div class="container text-center flex flex-col justify-center items-center h-full">
    <h1 class="w-100 font-secondary font-bold text-gray-200 text-6xl">404 | Request not found!</h1>
    
    <div class="flex flex-wrap justify-center items-start flex-wrap gap-5 mt-20">
      <a href="<?php echo $router->prevURL(); ?>" class="inline-flex justify-between text-white items-center font-bold rounded py-2 px-4 bg-blue-900 hover:bg-gold hover:text-black text-xl">Go back</a>
    </div>

  </div>
</section>

<?php get_template_part('footer'); ?>