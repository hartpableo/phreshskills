<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage query */
if (url_has_no_query_strings()) {
  $jobseekers = $db->query('select * from jobseekers')->findAll();
} else {
  $jobseekers = $db->query('select * from jobseekers where lower(name) like :search', [
    ':search' => '%' . strtolower($_GET['search']) . '%'
  ])->findAll();
}

view('jobseekers/index', [
  'jobseekers' => $jobseekers
]);