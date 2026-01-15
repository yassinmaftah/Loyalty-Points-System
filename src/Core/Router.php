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
    public function getRoutes() {return $this->routes;}

    public function dispatch($requestUri, $requestMethod)
    {
        if (isset($this->routes[$requestMethod][$requestUri]))
        {
            $route = $this->routes[$requestMethod][$requestUri];
            $controllerName = $route['controller'];
            $actionName = $route['action'];
            $fullControllerName = "App\\Controllers\\" . $controllerName;
            if (class_exists($fullControllerName))
            {
                $controller = new $fullControllerName();
                $controller->$actionName();
            }
        }
        else
            echo "Page Not Found";
    }
}