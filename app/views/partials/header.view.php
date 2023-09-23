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
<body class="min-h-screen font-primary grid grid-rows-[auto_1fr_auto]">
  <header role="banner" class="bg-blue-900">
    <div class="container max-w-none py-4">
      <nav class="flex items-center justify-between flex-wrap">
        <div class="flex justify-between items-center lg:hidden w-full">
          <p class="text-white font-bold text-xl block lg:hidden font-secondary"><?php echo APP_NAME; ?></p>
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
          <p class="text-white font-bold text-xl hidden lg:block font-secondary" aria-hidden="true"><?php echo APP_NAME; ?></p>
          <ul class="text-uppercase lg:flex-grow animated jackinthebox xl:mx-8 text-end pt-3 lg:pt-[0_!important]">
            <li class="block lg:inline-block align-top">
              <a href="#home"
                class="block text-sm font-bold hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg <?php echo urlIs('/') ? 'text-orange-500' : 'text-white'; ?>">
                HOME
              </a>
            </li>
            <li class="block lg:inline-block align-top">
              <a href="#home"
                class="block text-sm font-bold text-white hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg">
                ROAD & STORY
              </a>
            </li>
            <li class="block lg:inline-block align-top">
              <a href="#home"
                  class="block text-sm font-bold text-white hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg">
                  ACCOMMODATION
              </a>
            </li>
            <li class="block lg:inline-block align-top">
              <a href="#home"
                class="block text-sm font-bold text-white hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg">
                TOURS
              </a>
            </li>
            <li class="block lg:inline-block align-top">
              <a href="#home"
                class="block text-sm font-bold text-white hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg">
                CONTACT US
              </a>
            </li>
            <li class="block lg:inline-block align-top">
              <a href="#home"
                class="block text-sm font-bold text-white hover:text-orange-500 mx-2 focus:text-blue-500 p-1 rounded-lg">
                COMING SOON
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <main>