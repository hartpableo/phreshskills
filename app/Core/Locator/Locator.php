<?php

namespace Core\Locator;

class Locator {
  protected mixed $user_ip = '';
  protected mixed $ip_info = '';

  public function __construct() {
    $this->user_ip = $_SERVER['REMOTE_ADDR'];
    $this->ip_info = json_decode(file_get_contents("https://ipinfo.io/{$this->user_ip}/json"));
  }

  public function isPH(): bool {
    if ($this->ip_info->country == "PH") {
      return true;
    } else {
      return false;
    }
  }
}