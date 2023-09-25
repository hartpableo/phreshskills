<?php

use Core\App;
use Core\Database;
use Core\Response;

$allowed_columns = ['id'];
$referenced_column = $dynamicQuery['referenced_column'];
$referenced_column_value = $dynamicQuery['referenced_column_value'];

if (!in_array($referenced_column, $allowed_columns)) abort(Response::FORBIDDEN);

/** connect to db */
$db = App::resolve(Database::class);

$job = $db->query("select * from jobs where {$referenced_column} = :{$referenced_column}", [
  ":{$referenced_column}" => $referenced_column_value
])->findOrFail();

return view('jobs/show', [
  'job' => $job
]);