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

define( 'ASSET_VERSION', isset( $_SERVER['IS_DDEV_PROJECT'] ) ? time() : '1.0.0' );
define('ROOT',  $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST']);
define('BASE_PATH', realpath(__DIR__ . '/../../'));
define('APP_NAME', 'Phreshskills');
define('APP_DESC', 'Hire Fresh Skills Now From the Talents in the Philippines!');
define(
  'SALARY_TYPES', 
  [
    'hourly',
    'daily',
    'weekly',
    'bi-weekly',
    'monthly',
  ]
);