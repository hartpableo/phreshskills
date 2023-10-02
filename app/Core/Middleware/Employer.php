<?php

namespace Core\Middleware;

use Core\Response;

class Employer 
{
  public function handle()
  {
    if (!isset($_SESSION['user']['user_type'])) 
    {
      abort(Response::FORBIDDEN);
      exit();
    }

    if ($_SESSION['user']['user_type'] !== 'employer')
    {
      abort(Response::FORBIDDEN);
      exit();
    }
  }
}