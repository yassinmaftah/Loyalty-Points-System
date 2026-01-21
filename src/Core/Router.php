<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller, $action)
    {
        $this->routes[$method][$uri] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($requestUri, $requestMethod, $twig)
    {
        if (isset($this->routes[$requestMethod][$requestUri])) 
        {
            $route = $this->routes[$requestMethod][$requestUri];
            $controllerName = "App\\Controllers\\" . $route['controller'];
            $actionName = $route['action'];
            if (class_exists($controllerName)) 
            {
                $controller = new $controllerName($twig);
                $controller->$actionName();
            }
        } 
        else
            echo "Page not found: " . $requestUri;
    }
}