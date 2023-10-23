<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\JobseekerLoginForm;

$attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
];

$form = JobseekerLoginForm::validate($attributes);

$signedIn = (new Authenticator())->jobseeker_login_attempt($attributes['email'],$attributes['password']);

/** validate user */
if (!$signedIn) {
  Session::flash('error-message', 'There is an error with your login credentials! Please review and try again. :)');
  $form->throw();
};

Session::flash('message', [
  'logged_in' => 'You have successfully logged in!'
]);


redirect();