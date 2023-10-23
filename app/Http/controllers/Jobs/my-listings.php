<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$jobs = $db->query('select * from jobs where employer_id = :id', [
  ':id' => get_current_uid()
])->findAll();

view('jobs/my-listings', [
  'jobs' => $jobs
]);