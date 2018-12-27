<?php
session_start();

class Router
{
  private $routes;

  public function __construct()
  {
      $routerPath = ROOT . '/config/routes.php';
      $this->routes = include($routerPath);
  }

  private function getURI()
  {
    if(!empty($_SERVER['REQUEST_URI'])){
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  public function run()
  {
    // Получаем строку запроса

    $uri = $this->getURI();

    //Проверяем наличие такого запроса в routes.php

    foreach ($this->routes as $uriPattern => $path){
      // Сравниваем $uriPattern и $uriPattern
      if(preg_match("~$uriPattern~", $uri)){
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
        // Если совпадение найдено, определяем контроллер и action
        //Разбиваем результат на сегменты с которыми будем в дальнейшем работать
        $segments = explode('/', $internalRoute);

        $controllerName = array_shift($segments) . 'Controller';
        $controllerName = ucfirst($controllerName);

        $actionName = 'action' . ucfirst(array_shift($segments));

        $parameters = $segments;

        // Подключаем файл класса контроллера
          $controllerFile = ROOT . '/controller/' . $controllerName . '.php';

          if(file_exists($controllerFile)){
            include_once($controllerFile);
          }
        //Создаем объект и вызываем метод соответсвующий url
        $controllerObject = new $controllerName;
        
        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

        if($result != NULL){
          break;
        }
      }
    }

  }


}

?>
