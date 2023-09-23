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
}