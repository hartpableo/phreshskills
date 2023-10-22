<?php

use Core\App;
use Core\Database;
use Core\Session;

$current_user_id = Session::get_current_user()['id'];
$db = App::resolve(Database::class);
$current_employer = $db->query('select * from employers where employer_id = :id', [
  ':id' => $current_user_id
])->findOrFail();

view('jobs/create', [
  'current_employer' => $current_employer
]);