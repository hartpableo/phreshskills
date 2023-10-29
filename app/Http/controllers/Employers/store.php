<?php

use Core\App;
use Core\CSRFToken\CSRFToken;
use Core\Session;
use Core\Database;
use Core\Authenticator;
use Http\Forms\EmployerRegisterForm;

$db = App::resolve(Database::class);

$attributes = [
  'csrf_token' => $_POST['csrf_token'],
  'ruh' => $_POST['ruh'],
  'company_name' => trim($_POST['company_name']),
  'company_email' => $_POST['company_email'],
  'password' => $_POST['password']
];

// Check if ruh has a value and redirect to home if it does
if ( $attributes['ruh'] ) {
  Session::flash('error-message', 'We have detected spam activity from your IP address. Please try again later or contact me.');
  redirect();
}

$token = new CSRFToken();
$tokenIsValid = $token->validateToken( $attributes['csrf_token'] );
$form = EmployerRegisterForm::validate($attributes);

if ( ! $tokenIsValid ) {
  Session::flash('error-message', 'Looks like your token is invalid or expired. Please try again.');
  $form->throw();
}

$employerExists = (new Authenticator())->employerExists($attributes);

if ($employerExists) {
  Session::flash('error-message', 'That account already exists! Please login instead. :)');
  $form->throw();
};

$form->register($attributes);

Session::flash('message', [
  'registered' => 'Congratulations! You have been successfully registered. You can now login.'
]);

redirect( '/employer/login' );