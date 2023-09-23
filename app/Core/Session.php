<?php

namespace Core;

class Session 
{
  public static function has($key, $value = '')
  {
    if ($value && isset(static::get($key)[$value])) return true;
    
    return (bool) static::get($key);
  }

  public static function put($key, $value) 
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key, $default = null)
  {
    return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
  }

  public static function flash($key, $value) 
  {
    $_SESSION['_flash'][$key] = $value;
  }

  public static function removeFlash() 
  {
    unset($_SESSION['_flash']);
  }

  public static function destroy()
  {
    session_unset();
    session_destroy();
  
    $params = session_get_cookie_params();
    setcookie(
      'PHPSESSID', 
      '', 
      time() - 3600, 
      $params['path'], 
      $params['domain'], 
      $params['secure'], 
      $params['httponly']
    );
  }
}