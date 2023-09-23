<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $_GET['id'],
])->findOrFail();

view('tenants/edit', [
  'errors' => Session::get('errors'),
  'tenant' => $tenant
]);