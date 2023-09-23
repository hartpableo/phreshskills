<?php

namespace Core;

class Validator 
{
  public static function string($value, $min_length = 1, $max_length = INF)
  {
    $value = trim($value);
    return (strlen($value) >= $min_length && strlen($value) <= $max_length) ? true : false;
  }

  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function date($value)
  {
    return (bool) $value;
  }

  public static function imageValidate($imageFile = [], $maxSize = 1000000)
  {
    $file_type = $imageFile['type'];
    $allowed = array("image/jpeg", "image/gif", "image/jpg", "image/png", "image/webp");

    if(!empty($file_type) && !in_array($file_type, $allowed)) return false;

    return $imageFile['size'] <= $maxSize;
  }

  public static function contactNumber($value)
  {
      // Remove all non-digit characters from the contact number
      $cleanedNumber = preg_replace('/\D/', '', $value);
      // Example: Validate if the cleaned number is exactly 10 digits
      return (bool) ctype_digit($cleanedNumber) && strlen($cleanedNumber) <= 13 && strlen($cleanedNumber) > 6;
  }
}