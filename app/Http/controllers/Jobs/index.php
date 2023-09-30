<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage queries */
if (url_has_no_query_strings()) {

  $jobs = $db->query('select * from jobs join employers on jobs.employer_id = employers.employer_id order by jobs.date_published desc')->findAll();

} else {

  $jobTitle = empty($_GET['job-title']) ? null : '%' . strtolower($_GET['job-title']) . '%';
  $companyName = empty($_GET['company']) ? null : '%' . strtolower($_GET['company']) . '%';
  $salary = empty($_GET['salary']) ? null : $_GET['salary'];
  $salaryType = empty($_GET['salary_type']) ? null : strtolower($_GET['salary_type']);

  $jobs = $db->query('select * from jobs 
  join employers on jobs.employer_id = employers.employer_id 
  where 
    (lower(title) like :job_title or :job_title is null) 
    and (lower(employers.company_name) like :company_name or :company_name is null) 
    and ((lower(salary_type) = :salary_type) or :salary_type is null)
    and ((CAST(salary as decimal) >= CAST(:salary as decimal)) or :salary is null)',
  [
    ':job_title' => $jobTitle,
    ':company_name' => $companyName,
    ':salary' => $salary,
    ':salary_type' => $salaryType
  ])->findAll();


}

view('jobs/index', [
  'jobs' => $jobs
]);