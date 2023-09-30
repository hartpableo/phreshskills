<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo (!isHome() && isset($pageDescription)) ? $pageDescription : APP_DESC; ?>">
  <title><?php echo (!isHome() && isset($pageTitle)) ? "{$pageTitle} | " . APP_NAME : APP_NAME; ?></title>
  <link rel="stylesheet" href="<?php echo load_asset('css/style.css'); ?>">

  <!-- assets preloading -->
  <link rel="preload" as="image" href="<?php echo image_uri('hero-bg.webp'); ?>">

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
            <!-- <li class="block lg:inline-block align-top lg:align-middle mt-5 lg:mt-0 lg:ml-5">
              <a href="/login"
                class="block text-lg font-bold text-white hover:text-gold mx-2 focus:text-blue-500 p-1 rounded-lg font-secondary">
                Login
              </a>
            </li>
            <li class="block lg:inline-block align-top lg:align-middle relative">
              <button 
                aria-label="Open sign up options"
                data-target="#sign-up-dropdown"
                type="button"
                class="block text-lg font-bold text-white hover:text-gold mx-2 focus:text-blue-500 p-1 rounded-lg font-secondary uppercase"
                aria-expanded="false"
              >Sign up</button>
              <div id="sign-up-dropdown" class="absolute bg-white border border-solid border-gray-300 shadow-lg right-0 top-full w-max z-10 mt-5 text-left min-w-[16em] hidden">
                <a href="/employer/sign-up" class="block leading-tight font-semibold p-6 hover:text-gold border-b border-solid hover:bg-gray-100">Sign up as Employer</a>
                <a href="/jobseeker/sign-up" class="block leading-tight font-semibold p-6 hover:text-gold hover:bg-gray-100">Sign up as Jobseeker</a>
              </div>
            </li> -->
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- <script>
    const signupButton = document.querySelector('button[data-target="#sign-up-dropdown"]');
    const signupDropdown = document.querySelector(signupButton.dataset.target);

    document.addEventListener('DOMContentLoaded', () => {

      signupButton.addEventListener('click', () => {

        let dropdownIsExpanded = signupButton.getAttribute('aria-expanded') == 'true';

        if (!dropdownIsExpanded) {
          signupDropdown.classList.remove('hidden');
          signupButton.setAttribute('aria-expanded', true);
        } else {
          signupDropdown.classList.add('hidden');
          signupButton.setAttribute('aria-expanded', false);
        }

        event.stopPropagation();

      }, { passive: true })

      document.addEventListener('click', (event) => {
        const target = event.target;
        const isInsideDropdown = signupDropdown.contains(target);

        if (!isInsideDropdown) {
          signupDropdown.classList.add('hidden');
          signupButton.setAttribute('aria-expanded', false);
        }
      }, { passive: true });

    }, { passive: true })
  </script> -->

  <main>