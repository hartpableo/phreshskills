<?php

namespace Http\Forms;

use Core\App;
use Core\Formatter;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;
use Core\Database;

class CreateJobForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['title'], 2, INF)) $this->errors['title_error'] = 'Title is invalid.';
    if (!Validator::string($attributes['description'], 7, 8000)) $this->errors['description_error'] = 'Description length is invalid.';
    if (!Validator::string($attributes['skillset'], 2, INF)) $this->errors['skillset_error'] = 'Please be a bit more specific with your required skillset. :)';
    if (!Validator::url_or_email($attributes['application_link'])) $this->errors['application_link_error'] = 'The provided application link is invalid. Please provide a URL or an email address.';
    if (!Validator::date($attributes['date_end'])) $this->errors['date_end_error'] = 'Please specify until when you\'ll be accepting applicants for this role. :)';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function register($attributes = []) 
  {
    App::resolve(Database::class)
        ->query('insert into jobs(title, salary, salary_type, skillset, description, benefits, employer_id, application_link) 
        values(:title, :salary, :salary_type, :skillset, :description, :benefits, :employer_id, :application_link)', 
    [
      ':title' => $attributes['title'],
      ':salary' => $attributes['salary'],
      ':salary_type' => $attributes['salary_type'],
      ':skillset' => Formatter::clean_array_items($attributes['skillset']),
      ':description' => $attributes['description'],
      ':benefits' => $attributes['benefits'],
      ':employer_id' => $attributes['employer_id'],
      ':application_link' => $attributes['application_link'],
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}