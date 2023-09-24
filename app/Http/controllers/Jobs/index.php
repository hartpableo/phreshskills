<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage query */
if (searchIsEmpty()) {
  $jobs = $db->query('select * from jobs')->findAll();
} else {
  $jobs = $db->query('select * from jobs where lower(name) like :search', [
    ':search' => '%' . strtolower($_GET['search']) . '%'
  ])->findAll();
}

view('jobs/index', [
  'jobs' => $jobs
]);