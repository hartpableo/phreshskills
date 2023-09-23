<?php

namespace Core;

use Core\App;
use Core\Session;
use Core\Database;

class Authenticator 
{
  public function attempt($name, $password) 
  {
    $manager = App::resolve(Database::class)->query('select * from managers where name = :name', [
      ':name' => $name
    ])->find();

    if ($manager && $manager['name'] === $name && md5($password) == $manager['password']) {
      $this->login([
        'id' => $manager['id'],
        'name' => $name
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

  public function tenantExists($attributes = [])
  {
    $tenant = App::resolve(Database::class)->query('select * from tenants where name = :name and email = :email and contact = :contact and room = :room', [
      ':name' => $attributes['name'],
      ':email' => $attributes['email'],
      ':contact' => $attributes['contact'],
      ':room' => $attributes['room'],
    ])->find();

    return (bool) ($tenant) ? true : false;
  }

  public function login($user = []) {
    Session::put('user', $user);
    session_regenerate_id(true);
  }
  
  public function logout() {
    Session::destroy();
  }
}