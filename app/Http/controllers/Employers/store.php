<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Authenticator;
use Http\Forms\EmployerRegisterForm;

$db = App::resolve(Database::class);

$attributes = [
  'company_name' => trim($_POST['company_name']),
  'company_email' => $_POST['company_email'],
  'password' => $_POST['password']
];

$form = EmployerRegisterForm::validate($attributes);

$employerExists = (new Authenticator())->employerExists($attributes);

if ($employerExists) $form->addError('errors', 'You are already registered! Please login instead.')->throw();

$form->register($attributes);

Session::flash('message', [
  'registered' => 'Congratulations! You have been successfully registered.'
]);

redirect();