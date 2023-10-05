<?php

use Core\Session;
use Core\Authenticator;

(new Authenticator())->logout();

Session::flash('message', [
  'logged_out' => 'You have successfully logged out!'
]);

redirect();