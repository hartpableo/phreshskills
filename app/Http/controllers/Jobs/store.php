<?php

use Core\App;
use Core\Session;
use Core\Database;
use Http\Forms\CreateJobForm;

$db = App::resolve(Database::class);

$attributes = [
  'title' => trim($_POST['title']),
  'salary' => $_POST['salary'],
  'salary_type' => $_POST['salary_type'],
  'skillset' => $_POST['skillset'],
  'description' => $_POST['description'],
  'employer_id' => $_POST['employer_id']
];

$form = CreateJobForm::validate($attributes);

$form->register($attributes);

Session::flash('message', [
  'registered' => 'Congratulations! Your job has been posted.'
]);

redirect();