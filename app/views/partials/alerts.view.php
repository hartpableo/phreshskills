<?php
  use Core\Session;
?>

<?php if (Session::has('message')) : ?>
  <?php foreach (Session::get('message') as $message) : ?>
    <div class="alert fixed z-50 w-full top-[10vh] max-w-xl left-1/2 translate-x-[-50%] rounded-lg flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" role="presentation" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
      </svg>
      <div class="ml-3 text-sm font-medium"><?php echo $message; ?></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php if (Session::has('error-message')) : ?>
  <div class="alert fixed z-50 w-full top-[10vh] max-w-xl left-1/2 translate-x-[-50%] rounded-lg flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" role="presentation" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
    </svg>
    <div class="ml-3 text-sm font-medium"><?php echo Session::get('error-message'); ?></div>
  </div>
<?php endif; ?>
