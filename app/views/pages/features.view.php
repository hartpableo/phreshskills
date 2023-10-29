<?php get_template_part('header', [
    'pageTitle' => 'Upcoming Features 🚀',
]); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <article class="container max-w-lg py-16 text-gray-200" role="article">

    <h1 class="mb-7 text-4xl font-secondary text-gold font-bold">Upcoming Features</h1>

    <div class="body">
      <ol class="list-decimal ml-4 mb-8">
        <li>Paid plans for more monthly posts or exisiting posts extensions</li>
        <li>...</li>
      </ol>
      <p>Suggest me more features and I will list them here!<br> Email: <strong>pableoh@gmail.com</strong></p>
    </div>

  </article>
</section>

<?php get_template_part('footer'); ?>