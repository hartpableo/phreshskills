<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;

class Authenticator 
{
  public function attempt($email, $password) 
  {
    $jobseeker = App::resolve(Database::class)->query('select * from jobseekers where email = :email', [
      ':email' => $email,
    ])->find();

    if ($jobseeker && $jobseeker['email'] === $email && password_verify($password, $jobseeker['password'])) {
      $this->login([
        'id' => $jobseeker['id'],
        'user_type' => 'jobseeker',
        'name' => $jobseeker['name']
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

  public function login($user = []) {
    Session::put('user', $user);
    session_regenerate_id(true);
  }
  
  public function logout() {
    Session::destroy();
  }
}