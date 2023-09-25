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
$router->get('/frequently-asked-questions', 'Pages/faq');

$router->get('/jobs', 'Jobs/index');
$router->get('/jobs/create', 'Jobs/create');
$router->get('/job/{job:id}', 'Jobs/show');

$router->get('/jobseekers', 'Jobseekers/index');
$router->get('/jobseeker/{jobseeker:id}', 'Jobseekers/show');