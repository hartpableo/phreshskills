<?php

use Core\Session;

view('managers/login', [
  'errors' => Session::get('errors')
]);