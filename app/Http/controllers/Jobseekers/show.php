<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Formatter;

$allowed_columns = ['id'];
$referenced_column = $dynamicQuery['referenced_column'];
$referenced_column_value = $dynamicQuery['referenced_column_value'];

if (!in_array($referenced_column, $allowed_columns)) abort(Response::FORBIDDEN);

/** connect to db */
$db = App::resolve(Database::class);

$jobseeker = $db->query("select * from jobseekers where {$referenced_column} = :{$referenced_column}", [
  ":{$referenced_column}" => $referenced_column_value
])->findOrFail();

$work_background = [];

$prev_companies = Formatter::string_to_array(',', $jobseeker['work_background_company_name']);
$prev_positions = Formatter::string_to_array(',', $jobseeker['work_background_position']);
$prev_work_durations = Formatter::string_to_array(',', $jobseeker['work_background_duration']);

if (isset($prev_companies) && is_array($prev_companies)) {
  for ($i = 0; $i < count($prev_companies); $i++) {
    $entry = array(
        'company' => $prev_companies[$i],
        'position' => $prev_positions[$i],
        'duration' => $prev_work_durations[$i]
    );
    $work_background[] = $entry;
  }
}

return view('jobseekers/show', [
  'jobseeker' => $jobseeker,
  'work_background' => $work_background
]);