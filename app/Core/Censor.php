<?php

namespace Core;

class Censor 
{
  private $text;

  public function __construct($unfilteredText)
  {
    $this->text = $unfilteredText;
  }

  public function get_censored_data() {
    $text = $this->censorEmails($this->text);
    $filteredText = $this->censorLinks($text);
    return $filteredText;
  }

  public function generic_censor()
  {
    return $this->censorString($this->text);
  }

  private function censorEmails($text) {
    $text = preg_replace_callback('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/', function($match) {
        return $this->censorString($match[0]);
    }, $text);

    return $text;
  }

  private function censorLinks($text) {
    $text = preg_replace_callback('/<a\s+(?:[^>]*)href=["\']([^"\']*)["\']([^>]*)>(.*?)<\/a>/i', function($match) {
      return $this->censorString($match[3] != '' ? $match[3] : $match[0]);
    }, $text);

    return $text;
  }

  private function censorString($string) {
    $censoredString = str_repeat('*', strlen($string));
    return "<strong class=\"blur-sm text-white select-none pointer-events-none\" data-notice=\"You must be a logged in user to view this specific content.\">{$censoredString}</strong>";
  }
}