<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage queries */
if (url_has_no_query_strings()) {

  $jobs = $db->query('select * from jobs join employers on jobs.employer_id = employers.employer_id order by jobs.date_published desc')->findAll();

} else {

  $params = [];
  $query = '';

  if (!empty($_GET['skills'])) {
    $skills = array_map('strtolower', $_GET['skills']);

    $skills_query = array_map(function($key) {
      return "lower(skillset) like :skill{$key}";
    }, array_keys($skills));

    if (!empty($query)) {
      $query .= ' or ';
    }

    $query .= '(' . implode(' or ', $skills_query) . ')';

    $params += array_combine(array_map(function($key) {
      return ":skill{$key}";
    }, array_keys($skills)), array_map(function($skill) {
      return '%' . $skill . '%';
    }, $skills));

  }

  $jobTitle = empty($_GET['job-title']) ? null : '%' . strtolower($_GET['job-title']) . '%';
  $salary = empty($_GET['salary']) ? null : $_GET['salary'];
  $salaryType = empty($_GET['salary_type']) ? null : strtolower($_GET['salary_type']);

  if (empty($query)) {

    $jobs = $db->query('select * from jobs 
    join employers on jobs.employer_id = employers.employer_id 
    where 
      (lower(title) like :job_title or :job_title is null) 
      and ((lower(salary_type) = :salary_type) or :salary_type is null)
      and ((CAST(salary as decimal) >= CAST(:salary as decimal)) or :salary is null)',
    [
      ':job_title' => $jobTitle,
      ':salary' => $salary,
      ':salary_type' => $salaryType
    ])->findAll();

  } else {

    $additional_params = [
      ':job_title' => $jobTitle,
      ':salary' => $salary,
      ':salary_type' => $salaryType,
    ];

    $params = array_merge($params, $additional_params);

    $jobs = $db->query("select * from jobs 
    join employers on jobs.employer_id = employers.employer_id 
    where 
      (lower(title) like :job_title or :job_title is null) 
      and ((lower(salary_type) = :salary_type) or :salary_type is null)
      and ((CAST(salary as decimal) >= CAST(:salary as decimal)) or :salary is null)
      and {$query}", $params)->findAll();

  }

}

/** get and combine all skills */
$all_skills = [];
$skills = $db->query('select skillset from jobs')->findAll();

if (!empty($skills)) {

  foreach ($skills as $skill => $skill_values) {
    $each_skills = explode(', ', strtolower($skill_values['skillset']));
    $all_skills = array_merge($all_skills, $each_skills);
  }

  $all_skills = array_unique($all_skills);

}

view('jobs/index', [
  'jobs' => $jobs,
  'all_skills' => $all_skills
]);