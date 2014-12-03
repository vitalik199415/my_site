<?php

class Controller
{
    public $model;
    public $view;
    public $load;
    public $template;

    public function __construct()
    {
        $this->view = new View();
        $this->template = new Template();
    }

    public function index()
    {

    }
}

/* End of file controller.php */
/*  */