<?php

namespace Http\Forms;

use Core\App;
use Core\Formatter;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;
use Core\Database;

class CreateJobseekerForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 1, INF)) $this->errors['name_error'] = 'Please fill up your full name.';
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Please provide a valid email address. :)';
    if (!Validator::string($attributes['password'], 7, INF)) $this->errors['password_error'] = 'Password is invalid (Must be at least 7 characters).';
    if (!Validator::check_if_empty($attributes['rate'])) $this->errors['rate_error'] = 'Please add your desired salary rate. :)';
    if (!Validator::check_if_empty($attributes['position'])) $this->errors['position_error'] = 'Please state your job position or the job position you are after. :)';
    if (!Validator::string($attributes['summary'], 7, 8000)) $this->errors['summary_error'] = 'Summary length is invalid.';
    if (!Validator::string($attributes['skills'], 1, INF)) $this->errors['skills_error'] = 'Please specify your current skills to be able to help employers see what you can do. :)';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function register($attributes = []) 
  {

    $work_background = $attributes['work_background'];
    $prev_companies = implode(', ', $work_background['company']);
    $prev_positions = implode(', ', $work_background['position']);
    $prev_work_durations = implode(', ', $work_background['duration']);

    App::resolve(Database::class)
        ->query(
          'insert into jobseekers(name, email, password, salary_type, skills, summary, rate, position, work_background_company_name, work_background_position, work_background_duration) 
          values(:name, :email, :password, :salary_type, :skills, :summary, :rate, :position, :work_background_company_name, :work_background_position, :work_background_duration)', 
          [
            ':name' => $attributes['name'],
            ':rate' => $attributes['rate'],
            ':salary_type' => $attributes['salary_type'],
            ':skills' => Formatter::clean_array_items($attributes['skills']),
            ':summary' => $attributes['summary'],
            ':email' => $attributes['email'],
            ':password' => password_hash($attributes['password'], PASSWORD_DEFAULT),
            ':position' => $attributes['position'],
            ':work_background_company_name' => $prev_companies,
            ':work_background_position' => $prev_positions,
            ':work_background_duration' => $prev_work_durations,
          ]
        );

  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}