<?php

use Core\Session;

view('tenants/create', [
  'errors' => Session::get('errors')
]);