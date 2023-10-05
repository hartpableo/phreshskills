<?php

use Core\Session;
use Core\ValidationException;

session_start();

// App init
require __DIR__ . '/../app/Core/init.php';
require __DIR__ . '/../app/Core/bootstrap.php';

// Debug
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

// Remove query strings if $_GET items are empty
if ($_GET && empty(array_filter($_GET))) redirect(no_query_strings());

// Routing
try {
  
  $router->route($uri, $method, $dynamicQuery);

} catch (ValidationException $exception) {

  Session::flash('errors', $exception->errors);
  Session::flash('old', $exception->old);
  
  redirect($router->prevURL());
  
}

// Clear flashed session data
Session::removeFlash();
show($_SESSION);