<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$dynamicQuery = [];

/**
 * ==================
 * ===== Routes =====
 * ==================
 */

$router->get('/', 'Pages/index');

$router->get('/jobs', 'Jobs/index');

$router->get('/jobseeker/{jobseeker:id}', 'Jobseekers/show');