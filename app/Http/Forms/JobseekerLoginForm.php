<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\Form;
use Core\ValidationException;

class JobseekerLoginForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::email($attributes['email'])) $this->errors['email_error'] = 'Company email address is invalid!';
    if (!Validator::string($attributes['password'], 7, 255)) $this->errors['password_error'] = 'Password length is invalid (Must be at least 7 characters)!';
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->getErrors(), $this->attributes);
  }
}