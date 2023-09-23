<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo APP_DESC ?>">
  <title><?php echo APP_NAME ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo assetPath('css/style.css'); ?>">
  <script src="<?php echo assetPath('js/script.js') ?>" defer></script>
</head>
<body>
  <header class="mb-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <?php if (isHome()) : ?>
          <h1 class="m-0"><?php echo COMPANY_NAME; ?></h1>
          <?php else : ?>
          <h1 class="m-0"><a href="/" class="text-decoration-none" aria-label="link to home page"><?php echo COMPANY_NAME; ?></a></h1>
          <?php endif; ?>
          <p class="m-0 fw-light"><?php echo APP_NAME; ?></p>
        </div>
        <div class="col-12 col-md-6 text-md-end d-flex justify-content-end align-items-center gap-2">
          <?php if (auth()) : ?>
            <form action="/manager/logout" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-secondary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                Exit
              </button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
  <main>

  <?php $containerClasses = (urlIs('/') || isset($_GET['search'])) ? 'container py-5' : 'container' ?>
  
  <section>
    <div class="<?php echo $containerClasses ?>">