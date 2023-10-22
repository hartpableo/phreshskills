<?php


use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\UpdateJobseekerForm;

$db = App::resolve(Database::class);

$attributes = [
  'id' => trim($_POST['id']),
  'name' => trim($_POST['name']),
  'email' => trim($_POST['email']),
  'rate' => $_POST['rate'],
  'salary_type' => $_POST['salary_type'],
  'skills' => $_POST['skills'],
  'summary' => $_POST['summary'],
  'position' => $_POST['position'],
  'work_background' => $_POST['work_background'],
  'profile_photo' => $_FILES['profile_photo'],
  'original_profile_photo' => $_POST['original_profile_photo']
];

$form = UpdateJobseekerForm::validate($attributes);

$jobseeker = $db->query('select * from jobseekers where id = :id', [
  ':id' => $attributes['id'],
])->findOrFail();

if (!$jobseeker) {
  Session::flash('error-message', 'This is wierd. I couldn\'t find your account in the database. Please contact and inform me at pableoh@gmail.com. :) Your cooperation is highly appreciated!');
  $form->throw();
};

$form->update_jobseeker($attributes);

Session::flash('message', [
  'updated' => "Success, {$jobseeker['name']}! Your profile has been updated."
]);

redirect("/jobseeker/{$jobseeker['id']}");