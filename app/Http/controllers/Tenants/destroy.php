<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$attributes = [
  'id' => $_POST['id']
];

$tenant = $db->query('select * from tenants where id = :id', [
  ':id' => $attributes['id']
])->findOrFail();

$db->query('delete from tenants where id = :id', [
  ':id' => $attributes['id']
]);

Session::flash('message', [
  'deleted' => "<strong>{$tenant['name']}</strong> has been successfully removed!"
]);

redirect();