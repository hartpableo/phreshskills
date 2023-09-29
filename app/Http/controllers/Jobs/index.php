<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage queries */
if (url_has_no_query_strings()) {

  $jobs = $db->query('select * from jobs join employers on jobs.employer_id = employers.employer_id order by jobs.date_published desc')->findAll();

} else {

  $jobs = $db->query('select * from jobs join employers on jobs.employer_id = employers.employer_id where lower(title) like :job_title and lower(employers.company_name) like :company_name', [
    ':job_title' => '%' . strtolower($_GET['job-title']) . '%',
    ':company_name' => '%' . strtolower($_GET['company']) . '%'
  ])->findAll();

}

view('jobs/index', [
  'jobs' => $jobs
]);