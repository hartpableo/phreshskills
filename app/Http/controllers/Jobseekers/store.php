<?php

use Core\App;
use Core\Authenticator;
use Core\CSRFToken\CSRFToken;
use Core\Session;
use Core\Database;
use Http\Forms\CreateJobseekerForm;

$db = App::resolve(Database::class);

$attributes = [
  'csrf_token' => $_POST['csrf_token'],
  'ruh' => $_POST['ruh'],
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

// Check if ruh has a value and redirect to home if it does
if ( $attributes['ruh'] ) {
  Session::flash('error-message', 'We have detected spam activity from your IP address. Please try again later or contact me.');
  redirect();
}

$token = new CSRFToken();
$tokenIsValid = $token->validateToken( $attributes['csrf_token'] );
$form = CreateJobseekerForm::validate($attributes);

if ( ! $tokenIsValid ) {
  Session::flash('error-message', 'Looks like your token is invalid or expired. Please try again.');
  $form->throw();
}

$account_exists = (new Authenticator())->jobseekerExists($attributes);

if ($account_exists) {
  Session::flash('error-message', 'You are already registered! Please login instead.');
  $form->throw();
}

$form->register($attributes);

Session::flash('message', [
  'registered' => htmlspecialchars('Congratulations! Your jobseeker profile has been created. You can now login.' )
]);

redirect();