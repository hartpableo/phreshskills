<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

/**
 * ==================
 * ===== Routes =====
 * ==================
 */
// $router->get('/login', 'Managers/login')->only('guest');