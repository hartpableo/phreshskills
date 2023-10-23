<?php get_template_part('header'); ?>

<section class="has-overlay bg-fixed bg-center bg-cover relative isolate py-5 lg:py-10 h-full before:opacity-90" style="background-image: url(<?php echo image_uri('hero-bg.webp'); ?>);background-repeat: no-repeat;">
  <h1 class="container font-secondary text-4xl lg:text-6xl font-bold text-gold">My Listings</h1>
  <div class="container max-w-4xl">
    <?php if (!empty($jobs) && count($jobs)) : ?>
      <style>
        table, th, td {
          border: 1px solid #888;
          border-collapse: collapse;
        }
      </style>
      <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-blue-700 uppercase bg-gray-50">
            <tr class="font-secondary">
              <th class="px-6 py-3">Listing ID</th>
              <th class="px-6 py-3">Job Title</th>
              <th class="px-6 py-3">Salary</th>
              <th class="px-6 py-3">Open until</th>
              <th class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($jobs as $job) : ?>
          <tr class="bg-gray-200 border-b font-bold text-gray-800">
            <td class="px-6 py-4"><?php echo $job['id']; ?></td>
            <td class="px-6 py-4"><?php echo htmlspecialchars($job['title']); ?></td>
            <td class="px-6 py-4"><?php echo job_salary($job['salary'], $job['salary_type']) ?></td>
            <td class="px-6 py-4"><?php echo date('F d Y', strtotime($job['date_end'])); ?></td>
            <td class="px-6 py-4">
              <a href="/job/<?php echo $job['id']; ?>" class="inline-flex items-center px-3 py-2 text-md font-medium text-center text-white bg-blue-700 rounded hover:bg-gold hover:text-black border border-solid border-blue-700 hover:border-gold focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all">
                <span class="font-bold">View</span>
              </a>
            </td>
          </tr>
          </tbody>
          <?php endforeach; ?>
        </table>
      </div>
    <?php else : ?>
      <p class="text-4xl font-bold text-center my-44 font-secondary text-white">You have no jobs listed yet...</p>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part('footer'); ?>
