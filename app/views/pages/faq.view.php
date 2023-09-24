<?php get_template_part('header'); ?>

<section>
  <div class="container py-16">

    <h1 class="mb-7 text-6xl text-center font-secondary text-blue-900 font-bold">Frequently Asked Questions</h1>


    <div id="accordion-flush" class="max-w-lg mx-auto mt-10">
      <h2 id="accordion-heading-1">
        <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
          <span>What is Flowbite?</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
      </h2>
      <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
        <div class="py-5 border-b border-gray-200">
          <p class="mb-2 text-gray-500">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
          <p class="text-gray-500">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- <script>

</script> -->

<?php get_template_part('footer'); ?>