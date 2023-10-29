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
$router->get('/get-more-posts', 'Pages/get-more-posts');
//$router->get('/frequently-asked-questions', 'Pages/faq');
$router->get('/pricing', 'Pages/pricing');
$router->get('/full-disclosure', 'Pages/disclosure');

$router->get('/jobs', 'Jobs/index');
$router->get('/jobs/create', 'Jobs/create')->only('employer');
//$router->get('/job/edit', 'Jobs/edit')->only('employer');
$router->post('/jobs/add', 'Jobs/store')->only('employer');
$router->get('/jobs/my-listings', 'Jobs/my-listings')->only('employer');
$router->get('/job/{job:id}', 'Jobs/show')->only('auth');

$router->get('/jobseekers', 'Jobseekers/index');
$router->get('/jobseeker/create-profile', 'Jobseekers/create')->only('guest');
$router->get('/jobseeker/login', 'Jobseekers/login')->only('guest');
$router->get('/jobseeker/edit-profile', 'Jobseekers/edit')->only('jobseeker');
$router->patch('/jobseeker/update', 'Jobseekers/update')->only('jobseeker');
$router->post('/jobseeker/authenticate', 'Jobseekers/authenticate')->only('guest');
$router->post('/jobseeker/add', 'Jobseekers/store')->only('guest');
$router->get('/jobseeker/{jobseeker:id}', 'Jobseekers/show')->only('auth');
$router->delete('/jobseeker/logout', 'Jobseekers/logout')->only('jobseeker');

$router->get('/employer/login', 'Employers/login')->only('guest');
$router->get('/employer/register', 'Employers/create')->only('guest');
$router->post('/employer/store', 'Employers/store')->only('guest');
$router->post('/employer/authenticate', 'Employers/authenticate')->only('guest');
$router->delete('/employer/logout', 'Employers/logout')->only('employer');