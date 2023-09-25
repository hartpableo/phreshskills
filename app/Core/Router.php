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

  public function get($uri, $controller)
  {

    $queryControl = $this->assessUrl($uri);

    if (empty($queryControl)) {
      $this->add('GET', $uri, $controller);
    } else {
      $this->add('GET', $uri, $controller, $queryControl);
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

        if (str_contains($uri, "/{$route['query']['model']}/") && $route['method'] === strtoupper($method)) :

        $savedRoute = $route['uri'];
        $requestedRoute = $uri;

        $arr1 = explode('/', $savedRoute);
        $arr2 = explode('/', $requestedRoute);

        $diff1 = array_diff($arr1, $arr2);
        $diff2 = array_diff($arr2, $arr1);

        $savedParam = implode("/", $diff1);
        $requested_data = implode("/", $diff2);

        $savedRoute = str_replace($savedParam, $requested_data, $savedRoute);

        $dynamicQuery = [
          'referenced_column' => $route['query']['queried_data'],
          'referenced_column_value' => $requested_data
        ];

        Middleware::resolve($route['middleware']);

        return require base_path("app/Http/controllers/{$route['controller']}.php");

        endif;
        
      }

    }

    $this->abort();
  }

  protected function assessUrl($uri)
  {
    $queryControl = [];
    $str = $uri;
    $start = strpos($str, "{");
    $end = strpos($str, "}");
    $uriSubstring = substr($str, $start, $end - $start + 1);

    if (!strpos($uriSubstring, ':')) return $queryControl;
    
    $uriSubstring = str_replace(['{', '}'], '', $uriSubstring);
    $uriSubstrings = explode(':', $uriSubstring);

    $queryControl = [
      'queried_data' => $uriSubstrings[1],
      'model' => $uriSubstrings[0]
    ];

    return $queryControl;
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