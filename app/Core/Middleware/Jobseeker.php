<?php

namespace Core\Middleware;

use Core\Response;

class Jobseeker 
{
  public function handle()
  {
    if (!isset($_SESSION['user']['user_type'])) 
    {
      abort(Response::FORBIDDEN);
      exit();
    }

    if ($_SESSION['user']['user_type'] !== 'jobseeker')
    {
      abort(Response::FORBIDDEN);
      exit();
    }
  }
}