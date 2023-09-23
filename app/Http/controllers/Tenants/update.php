<?php

use Core\App;
use Core\Session;
use Core\Database;
use Http\Forms\UpdateTenantForm;

$db = App::resolve(Database::class);

$attributes = [
  'name' => trim($_POST['name']),
  'email' => $_POST['email'],
  'contact' => $_POST['contact'],
  'room' => $_POST['room'],
  'profile_image' => $_FILES['profile-image'],
  'orig_profile_image' => $_POST['orig-profile-image']
];

$form = UpdateTenantForm::validate($attributes);

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $_POST['id'],
])->findOrFail();

if (!$tenant) $form->addError('errors', 'Tenant already registered!')->throw();

$form->updateTenant($attributes);

Session::flash('message', [
  'updated' => "Success! {$tenant['name']}'s profile has been updated."
]);

redirect("/tenant/profile?id={$tenant['id']}");