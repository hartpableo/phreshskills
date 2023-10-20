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
    $uploadDir = BASE_PATH . '/public/assets/files/';

    // Check if directory exists and if not, create it
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

    $uploadFile = $uploadDir . "{$imgFile}";

    if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadFile)) return $imgFile;

    return false;

  }

  private static function cleanFileName($filename) {
    $newFilename = time() . '-' . str_replace(' ', '-', strtolower($filename));
    return $newFilename;
  }

  public static function cleanup_images() {
    $db = App::resolve(Database::class);
    $images_in_db = $db->query('select distinct photo from jobseekers')->findAll();

    // Convert the result to a simple array of image names
    $images_in_db = array_map(function($row) { return $row['profile_photo']; }, $images_in_db);

    $dir = BASE_PATH . '/public/assets/files/';
    if ($handle = opendir($dir)) {
      while (false !== ($file = readdir($handle))) {
        if ('.' === $file || '..' === $file) continue; // Skip . and ..

        // If the image is not in the database, delete it
        if (!in_array($file, $images_in_db)) {
          unlink($dir . $file);
        }
      }
      closedir($handle);
    }
  }

}