<?php

$salary_types = [
  'hourly',
  'daily',
  'weekly',
  'bi-weekly',
  'monthly',
];

view('jobs/create', [
  'salary_types' => $salary_types
]);