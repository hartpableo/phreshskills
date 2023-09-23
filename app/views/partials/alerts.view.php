<?php
  use Core\Session;
?>

<div class="mx-auto" style="max-width: <?php echo (!urlIs('/')) ? 'var(--bs-breakpoint-sm)' : null ?>;">

  <!-- Display Errors -->
  <?php if (!empty(Session::get('errors'))) : foreach (Session::get('errors') as $error) : ?>
  <div class="alert alert-danger py-2" role="alert">
    <?php echo $error; ?>
  </div>
  <?php endforeach; endif; ?>

  <!-- Display Flash Messages -->
  <?php if (Session::has('message')) : ?>
    <?php foreach (Session::get('message') as $message) : ?>
      <div class="alert alert-success py-2" role="alert">
        <?php echo $message; ?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>