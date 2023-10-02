<?php

namespace Core\Middleware;

use Exception;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Employer;
use Core\Middleware\Jobseeker;

class Middleware 
{
  const MAP = [
    'guest' => Guest::class,
    'auth' => Auth::class,
    'jobseeker' => Jobseeker::class,
    'employer' => Employer::class
  ];

  public static function resolve($key) 
  {
    if (!$key) return;

    $middleware = static::MAP[$key] ?? false;

    if (!$middleware) throw new Exception("No matching middleware found for key: >>>{$key}<<<.");

    (new $middleware)->handle();
  }
}