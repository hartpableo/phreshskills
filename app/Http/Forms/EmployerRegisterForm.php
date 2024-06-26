<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;

class EmployerRegisterForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['company_name'], 2, INF)) $this->errors['company_name_error'] = 'Please specify your company\'s name properly. :)';
    if (!Validator::email($attributes['company_email'])) $this->errors['company_email_error'] = 'Company email address is invalid!';
    if (!Validator::string($attributes['password'], 7, 255)) $this->errors['password_error'] = 'Password length is invalid (Must be at least 7 characters)!';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function register($attributes = []) 
  {
    App::resolve(Database::class)
        ->query('insert into employers(company_name, company_email, password, plan_cycle) 
        values(:company_name, :company_email, :password, :plan_cycle)',
    [
      ':company_name' => $attributes['company_name'],
      ':company_email' => $attributes['company_email'],
      ':password' => password_hash($attributes['password'], PASSWORD_DEFAULT),
      ':plan_cycle' => date( 'Y-m-d' )
    ]);
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}