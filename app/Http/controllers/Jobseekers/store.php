<?php

use Core\App;
use Core\Session;
use Core\Database;
use Http\Forms\CreateJobseekerForm;

$db = App::resolve(Database::class);

$attributes = [
  'name' => trim($_POST['name']),
  'rate' => $_POST['rate'],
  'salary_type' => $_POST['salary_type'],
  'skills' => $_POST['skills'],
  'summary' => $_POST['summary'],
  'position' => $_POST['position'],
  'work_background_company_name' => $_POST['work_background_company_name'],
  'work_background_position' => $_POST['work_background_position'],
  'work_background_duration' => $_POST['work_background_duration'],
];

show($attributes);

$form = CreateJobseekerForm::validate($attributes);

// $form->register($attributes);

// Session::flash('message', [
//   'registered' => 'Congratulations! Your job has been posted.'
// ]);

// redirect();