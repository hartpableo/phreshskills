<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;

class Authenticator 
{
  public function attempt($name, $password) 
  {
    $employer = App::resolve(Database::class)->query('select * from employers where company_name = :company_name', [
      ':company_name' => $name
    ])->find();

    if ($employer && $employer['company_name'] === $name && password_verify($password, $employer['password'])) {
      $this->login([
        'id' => $employer['employer_id'],
        'user_type' => 'employer',
        'company_name' => $name
      ]);

      return true;

    }
  }

  public function emailExists($email)
  {
    $user = App::resolve(Database::class)->query('select * from users where email = :email', [
      ':email' => $email
    ])->find();

    if ($user) return true;
  }

  public function employerExists($attributes = [])
  {
    $employer = App::resolve(Database::class)->query('select * from employers where company_name = :company_name and company_email = :company_email', [
      ':company_name' => $attributes['company_name'],
      ':company_email' => $attributes['company_email']
    ])->find();

    return (bool) ($employer) ? true : false;
  }

  public function login($user = []) {
    Session::put('user', $user);
    session_regenerate_id(true);
  }
  
  public function logout() {
    Session::destroy();
  }
}