<?php

namespace Core;

class Image
{
  public static function handleImage($imgFile, $origImgFile = '')
  {
    if (!empty($origImgFile) && empty($imgFile)) {
      return $origImgFile;
    }

    $imgFile = self::cleanFileName($imgFile);
    $uploadDir = BASE_PATH . '/public/assets/images/';

    // Check if directory exists and if not, create it
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

    $uploadFile = $uploadDir . "{$imgFile}";

    if (move_uploaded_file($_FILES['profile-image']['tmp_name'], $uploadFile)) return $imgFile;
    
    // show('Error');
  }

  private static function cleanFileName($filename) {
    $newFilename = time() . '-' . str_replace(' ', '-', strtolower($filename));
    return $newFilename;
  }
}