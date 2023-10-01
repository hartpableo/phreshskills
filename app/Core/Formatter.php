<?php

namespace Core;

class Formatter 
{
  public static function phoneNumber($phoneNumber)
  {
    // Remove all spaces from the phone number
    $phoneNumber = str_replace(' ', '', $phoneNumber);

    // Check if the phone number already uses the desired format
    if (strpos($phoneNumber, '+63') === 0) return $phoneNumber;

    // Check if the phone number starts with '0' and change to the desired format
    if (strpos($phoneNumber, '0') === 0) $phoneNumber = '+63' . substr($phoneNumber, 1);

    return $phoneNumber;
  }

  public static function clean_array_items($data)
  {
    $cleaned_array_items = array_map(function($item) {
      return trim($item);
    }, explode( ',', $data));

    return implode(', ', $cleaned_array_items);
  }

  public static function string_to_array($separator, $data)
  {
    if (!isset($data)) return false;
    return $new_array = array_map(function($item) {
      return trim($item);
    }, explode( $separator, $data));
  }
}