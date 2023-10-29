<?php

$token = new Core\CSRFToken\CSRFToken();
$token->generateToken();

return view('employers/register', [
  'csrf_token' => $token->getToken(),
]);