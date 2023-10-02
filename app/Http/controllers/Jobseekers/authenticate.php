<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\JobseekerLoginForm;

$attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
];

$form = JobseekerLoginForm::validate($attributes);

$signedIn = (new Authenticator())->attempt($attributes['email'],$attributes['password']);

/** validate user */
if (!$signedIn) $form->addError('errors', 'There is an error with your login credentials! Please review and try again. :)')->throw();

Session::flash('message', [
  'logged_in' => 'You have successfully logged in!'
]);


redirect();