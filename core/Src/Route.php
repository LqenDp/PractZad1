<?php

namespace Src;

use Error;

class Route
{
   private static array $routes = [];
   private static string $prefix = '';

   public static function setPrefix($value)
   {
       self::$prefix = $value;
   }

   public static function add(string $route, array $action): void
   {
       if (!array_key_exists($route, self::$routes)) {
           self::$routes[$route] = $action;
       }
   }

   public function start(): void
{
    // Получаем URI без GET-параметров
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    
    // Убираем префикс (папку проекта) из URI
    $prefix = self::$prefix;
    if ($prefix && strpos($uri, $prefix) === 0) {
        $path = substr($uri, strlen($prefix));
    } else {
        $path = $uri;
    }
    
    // Убираем лишние слэши в начале и конце
    $path = trim($path, '/');
    
    // Если путь пустой, используем '/' для главной страницы
    if ($path === '') {
        $path = '/';
    }
    
    // Проверяем существование маршрута
    if (!array_key_exists($path, self::$routes)) {
        throw new Error('This path does not exist. Path: "' . $path . '"');
    }

    $class = self::$routes[$path][0];
    $action = self::$routes[$path][1];

    if (!class_exists($class)) {
        throw new Error('This class does not exist');
    }
    if (!method_exists($class, $action)) {
        throw new Error('This method does not exist');
    }

    call_user_func([new $class, $action], new Request());
}
}