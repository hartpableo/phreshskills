<?php

use Core\App;
use Core\Database;

/** connect to db */
$db = App::resolve(Database::class);

/** manage query */
if (url_has_no_query_strings()) {

  $jobseekers = $db->query('select * from jobseekers order by rand()')->findAll();

} else {

  $params = [];
  $query = '';

  if (!empty($_GET['skills'])) {
    $skills = array_map('strtolower', $_GET['skills']);

    $skills_query = array_map(function($key) {
      return "lower(skills) like :skill{$key}";
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

  if (isset($_GET['position']) && strlen($_GET['position'])) {
    $params[':position'] = '%' . strtolower($_GET['position']) . '%';
    if (!empty($query)) {
      $query .= ' and ';
    }
    $query .= 'lower(position) like :position';
  }

  if (!empty($query)) {
    $jobseekers = $db->query('select * from jobseekers where ' . $query . ' order by rand()', $params)->findAll();
  } else {
    $jobseekers = $db->query('select * from jobseekers order by rand()')->findAll();
  }

}

/** get and combine all skills */
$all_skills = [];
$skills = $db->query('select skills from jobseekers')->findAll();

if (!empty($skills)) {

  foreach ($skills as $skill => $skill_values) {
    $each_skills = explode(', ', $skill_values['skills']);
    $all_skills = array_merge($all_skills, $each_skills);
  }

  $all_skills = array_unique($all_skills);

}

// show($jobseekers);

view('jobseekers/index', [
  'jobseekers' => $jobseekers,
  'all_skills' => $all_skills
]);
