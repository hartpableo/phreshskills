<?php

use Core\Locator\Locator;
use Core\Session;

$locator = new Locator();
if ( ! $locator->isPH() ) {
  Session::flash('error-message', 'Sorry! We\'ve detected that you\'re not from the Philippines. You can\'t create an account. If you think this is a mistake, please contact me directly and I will help you.');
  return redirect();
}

$token = new Core\CSRFToken\CSRFToken();
$token->generateToken();

return view('jobseekers/create', [
  'csrf_token' => $token->getToken(),
]);