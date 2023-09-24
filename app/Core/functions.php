<?php

use Core\Session;
use Core\Response;
use Core\Validator;

function show($stuff) {
  echo "<pre>";
  print_r($stuff);
  echo "</pre>";
  die();
}

function dd($stuff) {
  echo "<pre>";
  var_dump($stuff);
  echo "</pre>";
  // die();
}

function esc($str) {
  return htmlspecialchars($str);
}

function abort($status_code = Response::NOT_FOUND) {
  http_response_code($status_code);
  view("status_codes/{$status_code}");
  die();
}

function authorize($condition, $status_code = Response::FORBIDDEN) {
  if ($condition) abort($status_code);
}

function base_path($path = '') {
  return BASE_PATH . ($path ? DIRECTORY_SEPARATOR . $path : '');
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function no_query_strings() {
  return strtok($_SERVER["REQUEST_URI"], '?');
}

function view($path, $attributes = []) {
  extract($attributes);
  return require base_path("app/views/{$path}.view.php");
}

function get_template_part($template_part, $attributes = []) {
  view("partials/{$template_part}", $attributes);
}

function load_asset($path_to_file) {
  return ROOT . "/assets/{$path_to_file}";
}

function image_uri($image, $fallback = '') {
  if (!isset($image) || !strlen($image)) return $fallback ?? "https://picsum.photos/200/200";
  return load_asset("images/{$image}");
}

function auth() {
  return $_SESSION['user'] ?? false;
}

function redirect($path = '/') {
  header("location: {$path}");
  exit();
}

function getCurrentUserID() {
  return $_SESSION['user']['id'] ?? null;
}

function old($key, $default = '') {
  return Session::get('old')[$key] ?? $default;
}

function isHome() {
  return (bool) urlIs('/');
}

function convertDate($value, $format = 'Y-m-d H:i:s') {
  return date($format, strtotime($value));
}

function url_has_no_query_strings() {
  return (bool) (!isset($_GET) || !count($_GET));
}

function excerpt($string, $maxLength = 100) {
  return (strlen($string) > $maxLength) ? substr($string, 0, $maxLength) . '...' : $string;
}

function job_salary($salary, $salary_type) {

  $css_classes = 'text-sm font-medium';

  switch ($salary_type) {
    case 'hourly':
      return "\${$salary} <span class='{$css_classes}'>per hour</span>";
      break;

    case 'weekly':
      return "\${$salary} <span class='{$css_classes}'>per week</span>";
      break;

    case 'bi-weekly':
      return "\${$salary} <span class='{$css_classes}'>per two weeks (bi weekly)</span>";
      break;

    case 'monthly':
      return "\${$salary} <span class='{$css_classes}'>per month</span>";
      break;
  }

}