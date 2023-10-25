<?php

use Core\App;
use Core\Session;
use Core\Database;
use Core\PostsManager\PostsManager;
use Http\Forms\CreateJobForm;

$db = App::resolve(Database::class);

$attributes = [
  'title' => trim($_POST['title']),
  'salary' => $_POST['salary'],
  'salary_type' => $_POST['salary_type'],
  'skillset' => $_POST['skillset'],
  'description' => $_POST['description'],
  'benefits' => $_POST['benefits'],
  'employer_id' => $_POST['employer_id'],
  'date_end' => $_POST['date_end']
];

$employer = $db->query('select * from employers where employer_id = :employer_id', [
  ':employer_id' => $attributes['employer_id']
])->findOrFail();

$attributes['application_link'] = $_POST['application_link'] === '' ? $employer['company_email'] : $_POST['application_link'];

$form = CreateJobForm::validate($attributes);

$form->register($attributes);

$current_active_employer_posts = new PostsManager($employer);
$updated_available_posts = $current_active_employer_posts->update_employer_posts_data();

Session::flash('message', [
  'registered' => 'Congratulations! Your job has been posted.'
]);

redirect();