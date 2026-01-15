<?php
session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
$router = new Router();

$router->add('GET', '/home', 'AuthController', 'home');
$router->add('GET', '/login', 'AuthController', 'showLoginForm');
$router->add('POST', '/login', 'AuthController', 'login');
$router->add('GET', '/signup', 'AuthController', 'showSignupForm');
$router->add('POST', '/signup', 'AuthController', 'signup');
$router->add('GET', '/logout', 'AuthController', 'logout');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']); 
$requestUri = str_replace($scriptName, '', $requestUri);

$router->dispatch($requestUri, $requestMethod);