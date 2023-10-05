<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;

class Authenticator 
{
  public function jobseeker_login_attempt($email, $password) 
  {
    $jobseeker = App::resolve(Database::class)->query('select * from jobseekers where email = :email', [
      ':email' => $email,
    ])->find();

    if ($jobseeker && $jobseeker['email'] === $email && password_verify($password, $jobseeker['password'])) {
      $this->login([
        'id' => $jobseeker['id'],
        'user_type' => 'jobseeker',
        'name' => $jobseeker['name'],
        'email' => $jobseeker['email']
      ]);

      return true;

    }
  }

  public function employer_login_attempt($email, $password) 
  {
    $employer = App::resolve(Database::class)->query('select * from employers where company_email = :company_email', [
      ':company_email' => $email,
    ])->findOrFail();

    if ($employer && $employer['company_email'] === $email && password_verify($password, $employer['password'])) {
      
      $this->login([
        'id' => $employer['employer_id'],
        'user_type' => 'employer',
        'name' => $employer['company_name'],
        'email' => $employer['company_email']
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

  public function jobseekerExists($attributes = [])
  {
    $jobseeker = App::resolve(Database::class)->query('select * from jobseekers where name = :name and email = :email', [
      ':name' => $attributes['name'],
      ':email' => $attributes['email']
    ])->find();

    return (bool) ($jobseeker) ? true : false;
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