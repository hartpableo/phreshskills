<?php
use Core\Router;
$router = new Router();
$prev_url = $router->prevURL();
?>
<!-- Main modal -->
<div
    id="postsModal"
    aria-hidden="true"
    class="fixed top-0 left-0 right-0 flex justify-center items-center z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
    style="backdrop-filter: blur(11px);"
>
  <div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h2 class="text-xl font-bold text-gray-900 font-secondary">
          Out of available posts for this month!
        </h2>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-6">
        <p class="text-base leading-relaxed font-semibold text-gray-500">
          Sorry, you've reached the maximum number of posts for this month. You can come back next month to continue posting jobs, or you can purchase extra posts today.
        </p>
      </div>
      <!-- Modal footer -->
      <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <a href="/get-more-posts" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-blue-600">Get more posts</a>
        <a href="<?php echo $prev_url; ?>" class="text-gray-500 bg-white hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10">Go Back</a>
      </div>
    </div>
  </div>
</div>
