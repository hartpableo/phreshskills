<?php

namespace Core\Middleware;

use Core\Response;

class Auth 
{
  public function handle()
  {
    if (!isset($_SESSION['user'])) 
    {
      abort(Response::FORBIDDEN);
      exit();
    }
  }
}