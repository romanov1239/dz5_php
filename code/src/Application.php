<?php

namespace Geekbrains\Application1;
class Application
{
    private const APP_NAMESPACE = 'Geekbrains\Application1\Controllers\\';
    private string $controllerName;
    private string $methodName;
    private static array $config;

    public static function config (): array
    {
        return Application::$config;
    }

    public function run (): string
    {
        Application::$config = parse_ini_file ('config.ini', true);
        //echo 'PHP version: '.phpversion ();
        $routeArray = explode ('/', $_SERVER['REQUEST_URI']);
        if (isset($routeArray[1]) && $routeArray[1] != '') {
            $controllerName = $routeArray[1];
        } else {
            $controllerName = "page";
        }
        $this -> controllerName = Application::APP_NAMESPACE .
            ucfirst ($controllerName) . "Controller";
        if (class_exists ($this -> controllerName)) {

            if (isset($routeArray[2]) && $routeArray[2] != '') {
                $methodName = $routeArray[2];
            } else {
                $methodName = "index";
            }
            $this -> methodName = "action" . ucfirst ($methodName);
            if (method_exists ($this -> controllerName, $this -> methodName)) {
                $controllerInstance = new $this -> controllerName();

                return call_user_func_array (
                    [$controllerInstance, $this -> methodName],
                    []

                );
            } else {
                return "Метод не существует";
            }
        } else {
            //return "Класс $this->controllerName не существует" . var_dump ($_SERVER['REQUEST_URI']);

            header('HTTP/1.1 404 Not Found', true, 404);
            include ("error-page.html");
            exit;
        }
    }
}