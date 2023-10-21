<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Core\Database;
use Http\Forms\CreateJobseekerForm;

$db = App::resolve(Database::class);

$attributes = [
  'name' => trim($_POST['name']),
  'email' => trim($_POST['email']),
  'password' => trim($_POST['password']),
  'rate' => $_POST['rate'],
  'salary_type' => $_POST['salary_type'],
  'skills' => $_POST['skills'],
  'summary' => $_POST['summary'],
  'position' => $_POST['position'],
  'work_background' => $_POST['work_background'],
  'profile_photo' => $_FILES['profile_photo']
];

$form = CreateJobseekerForm::validate($attributes);

$account_exists = (new Authenticator())->jobseekerExists($attributes);

if ($account_exists) {
  Session::flash('error-message', 'You are already registered! Please login instead.');
  $form->throw();
}

$form->register($attributes);

Session::flash('message', [
  'registered' => htmlspecialchars('Congratulations! Your jobseeker profile has been created. <a href="/jobseeker/login">Proceed to Login!</a>')
]);

redirect();