<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if (searchIsEmpty()) {
  $tenants = $db->query('select * from tenants')->findAll();
} else {
  $tenants = $db->query('select * from tenants where lower(name) like :search', [
    ':search' => '%' . strtolower($_GET['search']) . '%'
  ])->findAll();
}

view('tenants/index', [
  'tenants' => $tenants
]);