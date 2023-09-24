<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage jobs query */
if (searchIsEmpty()) {
  $jobs = $db->query('select * from jobs')->findAll();
} else {
  $jobs = $db->query('select * from jobs where lower(title) like :search', [
    ':search' => '%' . strtolower($_GET['search']) . '%'
  ])->findAll();
}

/** manage employers query */
$employers = $db->query('select * from employers')->findAll();

view('jobs/index', [
  'jobs' => $jobs,
  'employers' => $employers
]);