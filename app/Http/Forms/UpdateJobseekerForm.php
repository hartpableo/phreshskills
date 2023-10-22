<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Formatter;
use Core\Image;
use Core\ValidationException;
use Core\Validator;
use Http\Forms\Form;

class UpdateJobseekerForm extends Form {
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 1, INF)) $this->errors['name_error'] = 'Please fill up your full name.';
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Please provide a valid email address. :)';
    if (!Validator::check_if_empty($attributes['rate'])) $this->errors['rate_error'] = 'Please add your desired salary rate. :)';
    if (!Validator::check_if_empty($attributes['position'])) $this->errors['position_error'] = 'Please state your job position or the job position you are after. :)';
    if (!Validator::string($attributes['summary'], 7, 8000)) $this->errors['summary_error'] = 'Summary length is invalid.';
    if (!Validator::string($attributes['skills'], 1, INF)) $this->errors['skills_error'] = 'Please specify your current skills to be able to help employers see what you can do. :)';
    if (!Validator::file($attributes['profile_photo'])) $this->errors['profile_photo_error'] = 'Please upload your profile picture.';
    if (!Validator::imageValidateWithOriginal($attributes['profile_photo'])) $this->errors['profile_photo_validation_error'] = 'Please make sure your image is using the correct format/fle type and is not larger than 2mb.';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);
    return ($instance->failed()) ? $instance->throw() : $instance;
  }

  public function update_jobseeker($attributes = [])
  {
    $work_background = $attributes['work_background'];
    $prev_companies = implode(', ', $work_background['company']);
    $prev_positions = implode(', ', $work_background['position']);
    $prev_work_durations = implode(', ', $work_background['duration']);
    $jobseeker_photo = !empty($attributes['profile_photo']) ? Image::handleImage($attributes['profile_photo']['name']) : $attributes['original_profile_photo'];

    App::resolve(Database::class)->query('update jobseekers set name = :name, rate = :rate, salary_type = :salary_type, profile_photo = :profile_photo, skills = :skills, summary = :summary, email = :email, position = :position, work_background_company_name = :work_background_company_name, work_background_position = :work_background_position, work_background_duration = :work_background_duration where id = :id', [
      ':id' => $attributes['id'],
      ':name' => $attributes['name'],
      ':rate' => $attributes['rate'],
      ':salary_type' => $attributes['salary_type'],
      ':profile_photo' => $jobseeker_photo,
      ':skills' => Formatter::clean_array_items($attributes['skills']),
      ':summary' => $attributes['summary'],
      ':email' => $attributes['email'],
      ':position' => $attributes['position'],
      ':work_background_company_name' => $prev_companies,
      ':work_background_position' => $prev_positions,
      ':work_background_duration' => $prev_work_durations,
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}