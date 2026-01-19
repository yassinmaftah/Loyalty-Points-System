<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

use App\Core\Router;
$router = new Router();

$router->add('GET', '/', 'AuthController', 'home');
$router->add('GET', '/login', 'AuthController', 'showLoginForm');
$router->add('POST', '/login', 'AuthController', 'login');
$router->add('GET', '/signup', 'AuthController', 'showSignupForm');
$router->add('POST', '/signup', 'AuthController', 'signup');
$router->add('GET', '/logout', 'AuthController', 'logout');

$router->add('GET', '/shop', 'ShopController', 'ShoP_Page');
$router->add('POST', '/shop/add', 'ShopController', 'add');
$router->add('GET', '/cart', 'ShopController', 'viewCart');
$router->add('GET', '/checkout', 'ShopController', 'checkout');
$router->add('GET', '/rewards', 'ShopController', 'showRewards');
$router->add('POST', '/shop/redeem', 'ShopController', 'redeemPoints');
$router->add('GET', '/history', 'ShopController', 'history');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestUri = str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $requestUri);

$router->dispatch($requestUri, $requestMethod, $twig);