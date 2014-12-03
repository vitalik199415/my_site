<?php

class Controller_Main extends Controller
{
    public function index()
    {
    	$this->template->add_success_message('This is horosho!');
        $this->view->generate('main_view', 'Главная');
    }

    public function login()
    {
        $this->load->model('login');
        $this->login->login();
    }
}

/* End of file controller_main.php */
/*  */