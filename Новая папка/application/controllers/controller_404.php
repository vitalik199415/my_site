<?php

class Controller_404 extends Controller
{
    public function index()
    {
        $this->view->generate('404_view', '404 Not Found', 'template_404');
    }
}