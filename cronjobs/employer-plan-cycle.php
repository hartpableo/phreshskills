<?php

require_once __DIR__ . '/commons.php';

try {
  $dsn = 'mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['name'] . ';charset=utf8mb4';
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ];
  $connection = new PDO($dsn, $db_config['user'], $db_config['pass'], $options);

  // Check the plan_cycle column of the employers table
  // and update the plan_cycle column value to 3 if it has been 30 days
  $sql = 'update employers set monthly_posts_remaining = 3 where datediff(curdate(), plan_cycle) >= 30';
  $stmt = $connection->prepare($sql);
  $stmt->execute();

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}