<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
  'name' => $_POST['name'],
  'password' => $_POST['password']
];

$form = LoginForm::validate($attributes);

$signedIn = (new Authenticator())->attempt($attributes['name'],$attributes['password']);

// Validate User
if (!$signedIn) $form->addError('errors', 'There is an error with your login credentials!')->throw();

Session::flash('message', [
  'logged_in' => 'You have successfully logged in!'
]);

redirect();