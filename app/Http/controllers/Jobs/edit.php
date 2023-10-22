<?php

use Core\App;
use Core\Database;
use Core\Router;

$db = App::resolve(Database::class);
$router = new Router();

if (url_has_no_query_strings()) redirect($router->prevURL());

$job = $db->query('select * from jobs where id = :id', [
  ':id' => $_GET['id']
])->findOrFail();

view('jobs/edit', [
  'job' => $job
]);