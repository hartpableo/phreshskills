<?php

use Core\App;
use Core\Database;
use Core\Formatter;
use Core\Session;

$db = App::resolve(Database::class);

$jobseeker = $db->query("select * from jobseekers where id = :id", [
  ':id' => Session::get_current_user()['id']
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


view('jobseekers/edit', [
  'jobseeker' => $jobseeker,
  'work_background' => $work_background
]);