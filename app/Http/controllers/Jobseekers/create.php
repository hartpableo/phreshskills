<?php

$token = new Core\CSRFToken\CSRFToken();
$token->generateToken();

return view('jobseekers/create', [
  'csrf_token' => $token->getToken(),
]);