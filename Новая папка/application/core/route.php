<?php
@session_start();

class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name     = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //получаем имя контроллера
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }

        //получаем действие
        if(!empty($routes[2]))
        {
            $action_name = $routes[2];
        }

        $model_file = 'm'.strtolower($controller_name);
        $model_path = 'application/models/'.$model_file.'.php';
        if(file_exists($model_path))
        {
            include $model_path;
        }

        $controller_name = 'Controller_'.$controller_name;
        $controller_file = strtolower($controller_name);
        $controller_path = 'application/controllers/'.$controller_file.'.php';
        if(file_exists($controller_path))
        {
            include $controller_path;
        }
        else
        {
            Route::Error404();
        }

        $controller = new $controller_name;
        $action = $action_name;
        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            Route::Error404();
        }
    }

    static function Error404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
    }
}

/* End of file route.php */
/*  */