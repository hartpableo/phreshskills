<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\Authenticator;
use Http\Forms\AddTenantForm;

$db = App::resolve(Database::class);

$attributes = [
  'name' => trim($_POST['name']),
  'email' => $_POST['email'],
  'contact' => $_POST['contact'],
  'room' => $_POST['room'],
  'rent_start' => $_POST['rent_start'],
  'profile_image' => $_FILES['profile-image']
];

// Validate submitted form values
$form = AddTenantForm::validate($attributes);

// Check if tenant is already registered
$tenantExists = (new Authenticator())->tenantExists($attributes);

if ($tenantExists) $form->addError('errors', 'Tenant already registered!')->throw();

$form->register($attributes);

Session::flash('message', [
  'registered' => 'Congratulations! Tenant has been successfully registered.'
]);

redirect();