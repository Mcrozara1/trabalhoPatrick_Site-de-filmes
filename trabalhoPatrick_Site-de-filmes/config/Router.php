<?php
class Router {
    private static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function get($route, $callback) {
        self::$routes['GET'][$route] = $callback;
    }

    public static function post($route, $callback) {
        self::$routes['POST'][$route] = $callback;
    }

    public static function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes[$method] as $route => $callback) {
            $pattern = preg_replace('/:(\w+)/', '(?<$1>[^/]+)', $route);
            $pattern = "@^{$pattern}$@D";

            if (preg_match($pattern, $uri, $matches)) {
                $params = array_intersect_key($matches, array_flip(array_filter(array_keys($matches), 'is_string')));
                call_user_func_array($callback, $params);
                return;
            }
        }

        http_response_code(404);
        exit;
    }
}
?>