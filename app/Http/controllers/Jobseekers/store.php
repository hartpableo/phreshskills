<?php

use Core\App;
use Core\Session;
use Core\Database;
use Http\Forms\CreateJobseekerForm;

$db = App::resolve(Database::class);

$attributes = [
  'name' => trim($_POST['name']),
  'email' => trim($_POST['email']),
  'rate' => $_POST['rate'],
  'salary_type' => $_POST['salary_type'],
  'skills' => $_POST['skills'],
  'summary' => $_POST['summary'],
  'position' => $_POST['position'],
  'work_background' => $_POST['work_background'],
];

$form = CreateJobseekerForm::validate($attributes);

$form->register($attributes);

Session::flash('message', [
  'registered' => 'Congratulations! Your jobseeker profile has been created.'
]);

redirect();