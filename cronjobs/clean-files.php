<?php

require_once __DIR__ . '/commons.php';

try {
  $dsn = 'mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['name'] . ';charset=utf8mb4';
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ];

  $connection = new PDO($dsn, $db_config['user'], $db_config['pass'], $options);

  $query = 'select distinct profile_photo from jobseekers';
  $statement = $connection->query($query);
  $images_in_db = $statement->fetchAll();
  $images_in_db = array_column($images_in_db, 'profile_photo');
  $dir = "{$base_path}/public/assets/files/";
  if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
      if ($file === '.' || $file === '..') continue; // Skip . and ..
      if (!in_array($file, $images_in_db)) unlink($dir . $file);
    }
    closedir($handle);
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}