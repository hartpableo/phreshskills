<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\EmployerLoginForm;

$attributes = [
  'company_name' => $_POST['company_name'],
  'company_email' => $_POST['company_email'],
  'password' => $_POST['password']
];

$form = EmployerLoginForm::validate($attributes);

$signedIn = (new Authenticator())->employer_login_attempt($attributes['company_email'],$attributes['password']);

/** validate user */
//if (!$signedIn) $form->addError('errors', 'There is an error with your login credentials! Please review and try again. :)')->throw();
if (!$signedIn) {
  Session::flash('error-message', 'There is an error with your login credentials! Please review and try again. :)');
  $form->throw();
}

Session::flash('message', [
  'logged_in' => 'You have successfully logged in!'
]);

redirect();