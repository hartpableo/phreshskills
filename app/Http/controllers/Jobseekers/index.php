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

view('jobseekers/index', [
  'jobseekers' => $jobseekers,
  'all_skills' => $all_skills
]);