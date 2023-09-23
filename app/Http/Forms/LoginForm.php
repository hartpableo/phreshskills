<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;
use Http\Forms\Form;

class LoginForm extends Form
{
  public function __construct(public array $attributes)
  {
    if (!Validator::string($attributes['name'], 2, INF)) $this->errors['name_error'] = 'Name is invalid!';
    if (!Validator::string($attributes['password'], 7, 255)) $this->errors['password_error'] = 'Password is invalid!';
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