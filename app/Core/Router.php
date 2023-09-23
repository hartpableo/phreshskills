<?php

namespace Core;

use Auth;
use Core\Middleware\Middleware;
use Guest;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];
  }

  public function get($uri, $controller)
  {
    $this->add('GET', $uri, $controller);

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

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
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