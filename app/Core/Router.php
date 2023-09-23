<?php

namespace Core;

use Auth;
use Core\Middleware\Middleware;
use Guest;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller, $query = null)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
      'query' => $query
    ];
  }

  protected function assessUrl($uri)
  {
    $queryControl = [];
    $str = $uri;
    $start = strpos($str, "{");
    $end = strpos($str, "}");
    $uriSubstring = substr($str, $start + 1, $end - $start - 1);

    if (!strpos($uriSubstring, ':')) return $queryControl;
    
    $uriSubstrings = explode(':', $uriSubstring);
    $queryControl = [
      'controllerQuery' => $uriSubstrings[1]
    ];

    return $queryControl;
  }

  public function get($uri, $controller)
  {

    $checkedUrl = $this->assessUrl($uri);

    if (empty($checkedUrl)) {
      $this->add('GET', $uri, $controller);
    } else {
      $this->add('GET', $uri, $controller, $checkedUrl['controllerQuery']);
    }

    return $this;
  }
  
  public function post($uri, $controller)
  {
    $this->add('POST', $uri, $controller);

    return $this;
  }

  public function delete($uri, $controller)
  {
    $this->add('DELETE', $uri, $controller);

    return $this;
  }

  public function patch($uri, $controller)
  {
    $this->add('PATCH', $uri, $controller);

    return $this;
  }

  public function put($uri, $controller)
  {
    $this->add('PUT', $uri, $controller);

    return $this;
  }

  public function only($key) 
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
  }

  public function route($uri, $method, $dynamicQuery)
  {
    foreach ($this->routes as $route) {

      if ($route['uri'] === $uri && $route['method'] === strtoupper($method) && empty($route['query'])) {

        Middleware::resolve($route['middleware']);

        return require base_path("app/Http/controllers/{$route['controller']}.php");

      } elseif (!empty($route['query'])) {

        $dynamicQuery['reference'] = $route['query'];

        $uriArray = explode('/', $uri);
        foreach ($uriArray as $part) {
          if (is_numeric($part)) $dynamicQuery['ref_value'] = $part;
        }

        Middleware::resolve($route['middleware']);

        return require base_path("app/Http/controllers/{$route['controller']}.php");
        
      }

    }

    $this->abort();
  }

  public function prevURL()
  {
    return $_SERVER['HTTP_REFERER'];
  }

  public function abort($status_code = 404)
  {
    abort($status_code);
  }
}