<?php

class Router
{
    //coleção (array) de rotas
    protected static $routes = [
        'GET' => [], //rotas registradas com o método GET
        'POST' => []  //rotas registradas com o método POST
    ];

    public static function get($route, $destination)
    {
        self::$routes['GET'][$route] = $destination;
    }

    public static function post($route, $destination)
    {
        self::$routes['POST'][$route] = $destination;

    }

    public static function resolve(string $uri, string $method = 'GET')
    {
        $queryString = Request::queryString();
        $cleanUri = ($queryString) ?
            str_replace("?" . $queryString,"", $uri) :
            $uri;

        $routes = self::$routes;
        if (!in_array($cleanUri,array_keys($routes[$method]))) {
            return http_response_code(404);
        }

        if($routes[$method][$cleanUri] instanceof closure) {
            return $routes[$method][$cleanUri]();
        }

        return $routes[$method][$cleanUri];
    }
}