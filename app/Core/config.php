<?php

if (!defined($_SERVER['IS_DDEV_PROJECT']) || $_SERVER['IS_DDEV_PROJECT'] == 'false') {
  define('DEBUG', false);
  define('DBNAME', 'db');
  define('DBHOST', 'db');
  define('DBUSER', 'db');
  define('DBPASS', 'db');

  // define('ROOT', 'https://live-domain.com');
} else {
  require 'config.ddev.php';
};

define('BASE_PATH', realpath(__DIR__ . '/../../'));

define('APP_NAME', 'Tenant Management System');
define('APP_DESC', 'A php system for managing or keeping track of tenants in an apartment/rental property.');
define('COMPANY_NAME', 'Moalboal Hotel & Bar');