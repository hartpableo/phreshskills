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
    if (!Validator::check_if_empty($attributes['rate'])) $this->errors['rate_error'] = 'Please add your desired salary rate. :)';
    if (!Validator::check_if_empty($attributes['position'])) $this->errors['position_error'] = 'Please state your job position or the job position you are after. :)';
    if (!Validator::string($attributes['summary'], 7, 8000)) $this->errors['summary_error'] = 'Summary length is invalid.';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function register($attributes = []) 
  {
    App::resolve(Database::class)->query('INSERT INTO jobs(title, salary, salary_type, skillset, description, benefits, employer_id) VALUES(:title, :salary, :salary_type, :skillset, :description, :benefits, :employer_id)', [
      ':title' => $attributes['title'],
      ':salary' => $attributes['salary'],
      ':salary_type' => $attributes['salary_type'],
      ':skillset' => Formatter::clean_array_items($attributes['skillset']),
      ':description' => $attributes['description'],
      ':benefits' => $attributes['benefits'],
      ':employer_id' => $attributes['employer_id'],
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}