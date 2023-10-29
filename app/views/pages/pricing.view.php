<?php get_template_part('header', [
    'pageTitle' => 'Pricing',
]); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <article class="container max-w-lg py-16 text-gray-200" role="article">

    <h1 class="mb-1 text-6xl font-secondary text-gold font-bold">Pricing</h1>
    <p class="mb-7">Here are the available pricing plans for improved employers' experience.</p>

    <div class="body">
      <h2 class="text-3xl font-bold mb-3">Free Tier</h2>
      <p>This is what you have upon registration.</p>
      <ul class="list-disc list-outside ml-5 mb-8">
        <li class="mb-1"><strong>Job Posts:</strong> Enjoy up to 3 job posts per month. Reach potential candidates and grow your team without any cost.</li>
        <li class="mb-1"><strong>Visibility:</strong> Your job posts will be visible to our active jobseekers.</li>
        <li class="mb-1"><strong>1 Week Availability:</strong> Each job post remains live for one week, ensuring you find the right candidates.</li>
      </ul>
      <p class="text-sm text-gray-900 block pl-3 py-3 border-l-[.5em] border-l-green-500 bg-green-200"><em><strong>Note:</strong> More premium features are in development, so stay tuned for even greater benefits to enhance your recruiting efforts.</em></p>
    </div>

  </article>
</section>

<?php get_template_part('footer'); ?>