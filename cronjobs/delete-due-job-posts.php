<?php

require_once __DIR__ . '/commons.php';

try {
  $dsn = 'mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['name'] . ';charset=utf8mb4';
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ];
  $connection = new PDO($dsn, $db_config['user'], $db_config['pass'], $options);

  // ...

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}