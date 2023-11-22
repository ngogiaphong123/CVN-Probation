<?php

namespace Core;

class Router
{
    private array $routes = [];
    private string $basePath = '';

    public function __construct()
    {
        $this->basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    }

    public function get($route, $handler): void
    {
        $this->addRoute('GET', $route, $handler);
    }

    public function post($route, $handler): void
    {
        $this->addRoute('POST', $route, $handler);
    }

    public function put($route, $handler): void
    {
        $this->addRoute('PUT', $route, $handler);
    }

    public function delete($route, $handler): void
    {
        $this->addRoute('DELETE', $route, $handler);
    }

    public function addRoute($method, $route, $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'route' => $this->basePath . $route,
            'handler' => $handler,
        ];
    }


    public function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            // Replace route parameters with a regular expression
            $pattern = preg_replace('#\(/\w+:\w+\)#', '/(\d+)', $route['route']);
            $pattern = "#^" . $pattern . "$#";
            if ($method === $route['method'] && preg_match($pattern, $uri, $matches)) {
                // Remove the first match
                array_shift($matches);
                // Call the handler with the remaining matches as parameters
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }

        // No matching route was found
        http_response_code(404);
        echo '404 Page Not Found';
    }
}
