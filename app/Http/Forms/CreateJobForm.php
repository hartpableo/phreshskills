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