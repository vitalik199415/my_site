<?php

class Loader
{

    /**
     * @param $model_name
     */
    public function model($model_name)
    {
        $model_path = '../models/m'.$model_name.'.php';
        if(file_exists($model_path))
        {
            include $model_path;
        }
        $class = 'M'.$model_name;
        if(class_exists($class))
        {
            ${$model_name} = new $class;
        }
    }

    public function view($view_name)
    {
        $view_path = '../models/'.$view_name.'.php';
        if(file_exists($view_path))
        {
            include $view_path;
        }
    }
}

/* End of file loader.php */
/*  */