<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

if (!isset($_GET['id'])) abort(Response::NOT_FOUND);

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $_GET['id'],
])->findOrFail();

view('tenants/show', [
  'tenant' => $tenant
]);