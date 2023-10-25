<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token
');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, 'ATFuFkr3X0v7YtMmDMd2yowCUvlFuQrUWFtUramxqe3jAli_w1VkblM358xrBcgituR8a7nz85SRKACx' . ':' . 'EKZnJx-r-zGsKWr3iZ-TdUbbdAf3lm7ED65e_aWf5Bev_bDhMJ8w4Jm0CHZOgj3Ps-ZpyxV-SX5BOCDC');

$headers = [];
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
  echo "Error:" . $error;
} else {
  $response = json_decode($result);
  show($response);
}