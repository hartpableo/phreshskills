<?php

namespace Core;

use DateTime;

class Validator
{
  public static function string($value, $min_length = 1, $max_length = INF)
  {
    $value = trim($value);
    return (strlen($value) >= $min_length && strlen($value) <= $max_length) ? true : false;
  }

  public static function file($file): bool {
    return isset($file['tmp_name']) && !empty($file['tmp_name']);
  }

  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function date($date, $format = 'Y-m-d')
  {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
  }

  public static function notUnderage( $birthdate ): bool {
    $date = new DateTime( $birthdate );
    $now = new DateTime();
    $interval = $now->diff( $date );
    return $interval->y >= 18;
  }

  public static function imageValidate($imageFile = [], $maxSize = 2000000): bool
  {
    $file_type = $imageFile['type'];
    $allowed = array("image/jpeg", "image/gif", "image/jpg", "image/png", "image/webp");
    if(empty($file_type) && !in_array($file_type, $allowed)) return false;
    return $imageFile['size'] <= $maxSize;
  }

  public static function imageValidateWithOriginal($new_image = [], $maxSize = 2000000): bool
  {
    if (!empty($new_image['name'])) {
      $file_type = $new_image['type'];
      $allowed = array("image/jpeg", "image/gif", "image/jpg", "image/png", "image/webp");
      if(empty($file_type) && !in_array($file_type, $allowed)) return false;
      return $new_image['size'] <= $maxSize;
    }
    return true;
  }

  public static function check_if_empty($value)
  {
    return (bool) !empty($value);
  }

  public static function contactNumber($value)
  {
      // Remove all non-digit characters from the contact number
      $cleanedNumber = preg_replace('/\D/', '', $value);
      // Example: Validate if the cleaned number is exactly 10 digits
      return (bool) ctype_digit($cleanedNumber) && strlen($cleanedNumber) <= 13 && strlen($cleanedNumber) > 6;
  }

  public static function url_or_email($string) {
    if (filter_var($string, FILTER_VALIDATE_EMAIL) || filter_var($string, FILTER_VALIDATE_URL)) return true;
    
    return false;
  }
}