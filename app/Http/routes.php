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
$router->post('/jobs/add', 'Jobs/store');
$router->get('/job/{job:id}', 'Jobs/show');

$router->get('/jobseekers', 'Jobseekers/index');
$router->get('/jobseeker/create-profile', 'Jobseekers/create');
$router->post('/jobseeker/add', 'Jobseekers/store');
$router->get('/jobseeker/{jobseeker:id}', 'Jobseekers/show');

$router->get('/employer/login', 'Employers/login');
$router->get('/employer/register', 'Employers/create');
$router->post('/employer/store', 'Employers/store');
$router->post('/employer/authenticate', 'Employers/authenticate');