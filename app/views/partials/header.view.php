<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo (!isHome() && isset($pageDescription)) ? $pageDescription : APP_DESC; ?>">
  <title><?php echo (!isHome() && isset($pageTitle)) ? "{$pageTitle} | " . APP_NAME : APP_NAME; ?></title>
  <link rel="stylesheet" href="<?php echo load_asset('css/style.css'); ?>">
  <script src="<?php echo load_asset('js/script.js') ?>" defer></script>
</head>
<body class="min-h-screen font-primary grid grid-rows-[auto_1fr_auto] bg-gray-50 position-relative isolate bg-black">
  <header role="banner" class="bg-blue-900">
    <div class="container max-w-none py-4">
      <nav class="flex items-center justify-between flex-wrap">
        <div class="flex justify-between items-center lg:hidden w-full">
          <p class="text-white font-bold text-xl block lg:hidden font-secondary">
            <?php if (isHome()) : ?>
              <?php echo APP_NAME; ?>
            <?php else : ?>
              <a href="/"><?php echo APP_NAME; ?></a>
            <?php endif; ?>
          </p>
          <button
            class="navbar-burger flex items-center py-1 px-2 border rounded text-white border-white hover:text-white hover:border-white">
            <svg class="fill-current h-6 w-6 text-white" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div id="main-nav" class="w-full flex-grow lg:flex items-center justify-between lg:w-auto hidden">
          <p class="text-white font-bold text-xl hidden lg:block font-secondary" aria-hidden="true">
            <?php if (isHome('/')) : ?>
              <?php echo APP_NAME; ?>
            <?php else : ?>
              <a href="/"><?php echo APP_NAME; ?></a>
            <?php endif; ?>
          </p>
          <ul class="uppercase lg:flex-grow animated jackinthebox xl:mx-8 text-end pt-3 lg:pt-[0_!important]">
            <li class="block lg:inline-block align-top lg:align-middle">
              <a href="/"
                class="block text-md font-bold hover:text-gold mx-2 focus:text-blue-500 p-1 rounded-lg <?php echo urlIs('/') ? 'text-gold' : 'text-white'; ?>">
                Home
              </a>
            </li>
            <li class="block lg:inline-block align-top lg:align-middle">
              <a href="/jobs"
                class="block text-md font-bold hover:text-gold mx-2 focus:text-blue-500 p-1 rounded-lg <?php echo urlIs('/jobs') ? 'text-gold' : 'text-white'; ?>">
                Jobs
              </a>
            </li>
            <li class="block lg:inline-block align-top lg:align-middle">
              <a href="/jobseekers"
                class="block text-md font-bold hover:text-gold mx-2 focus:text-blue-500 p-1 rounded-lg <?php echo urlIs('/jobseekers') ? 'text-gold' : 'text-white'; ?>">
                Jobseekers
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main>